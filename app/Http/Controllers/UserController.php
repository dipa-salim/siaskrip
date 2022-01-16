<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $user1 = User::all();
        $user = $user->groupBy('role');
        return view('admin.dt-user', compact('user','user1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'password' => 'required|string|min:8|confirmed',
        //     'role' => 'required',
        // ]);
        if (!$request->nama || $request->nama == "") {
            Alert::error('Gagal', 'Username harus diisi');
            return redirect()->back();
        }

        if (!$request->email || $request->email == "") {
            Alert::error('Gagal', 'Email harus diisi');
            return redirect()->back();
        }

        if (!$request->password || $request->password == "") {
            Alert::error('Gagal', 'Password harus diisi');
            return redirect()->back();
        }

        if (!$request->role || $request->role == "") {
            Alert::error('Gagal', 'Role harus diisi');
            return redirect()->back();
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->back();

        // if ($request->role == 'Admin') {
        //     User::create([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'role' => $request->role,
        //     ]);
        //     Alert::success('Berhasil', 'Data Admin berhasil ditambahkan');
        //     return redirect()->back();
        // } else if($request->role == 'Mahasiswa') {
        //     User::create([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'role' => $request->role,
        //     ]);
        //     Alert::success('Berhasil', 'Data Mahasiswa berhasil ditambahkan');
        //     return redirect()->back();
        // } else if($request->role == 'Kaprodi'){
        //     User::create([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'role' => $request->role,
        //     ]);
        //     Alert::success('Berhasil', 'Data Kaprodi berhasil ditambahkan');
        //     return redirect()->back();
        // } else if($request->role == 'Dosen'){
        //     User::create([
        //         'nama' => $request->nama,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //         'role' => $request->role,
        //     ]);
        //     Alert::success('Berhasil', 'Data Dosen berhasil ditambahkan');
        //     return redirect()->back();
        // }

    }

    public function laporan()
    {
        $data_laporan = DB::table('tb_mahasiswa AS tm')->select('tm.nim', 'tm.nama', 'tmb.judul_skripsi',
        'tmb.status_surat_tugas','tmb.status_sempro','tmb.status_surat_skripsi','tmb.status_skripsi',
        'tmb.status_hasil_skripsi')
            ->join('tb_mhs_bimbingan AS tmb', 'tm.id_mahasiswa', '=', 'tmb.id_mahasiswa')
            // ->where('tmb.status_surat_tugas', 'approved')
            // ->where('tmb.status_sempro', 'approved')
            // ->where('tmb.status_surat_skripsi', 'approved')
            // ->where('tmb.status_skripsi', 'approved')
            // ->where('tmb.status_hasil_skripsi', 'approved')
            // ->whereIn('tst.status', ['belum_approve', 'approved'])
            ->get();
        return view('admin.adm-laporan', [
            'data_laporan' => $data_laporan
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // ini buat cek kalo data kosong
        if (!$request->password || $request->password == "") {
            Alert::error('Gagal', 'Password dan Confirm Password harus diisi');
            return redirect()->back();
        }

        $update = User::where('email', auth()->user()->email)->update([
            'password' => Hash::make($request->password)
        ]);

        Alert::success('Berhasil', 'Password berhasil diubah');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function ubah()
    {
        return view('ubah');
    }
}
