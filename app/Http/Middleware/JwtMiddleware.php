<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class JwtMiddleware extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            // dd(auth()->user());
            if (!$request->bearerToken()) {
                // dd($_COOKIE['smarttoken']);
                if($_COOKIE['smarttoken']) {
                    $token = $_COOKIE['smarttoken'];

                    $request->headers->add(['Authorization' => 'Bearer ' . $token]);
                    // dd($token);
                }
            }

            $request->user = JWTAuth::parseToken()->authenticate();

            if(!Auth::check()) {
                $userId = DB::table('tb_users')->select('id_user')->where('email', $request->user->getPayload()->get('email'))->first();
                $userId = $userId->id_user;

                Auth::loginUsingId($userId);
            }
        } catch (Exception $e) {
            // dd($e);
            return redirect('login');
            // if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
            //     return response()->json(['status' => 'Token is Invalid']);
            // }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
            //     return response()->json(['status' => 'Token is Expired']);
            // }else{
            //     return response()->json(['status' => 'Authorization Token not found']);
            // }
        }
        return $next($request);
    }
}
