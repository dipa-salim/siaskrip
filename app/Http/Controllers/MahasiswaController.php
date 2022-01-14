<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mahasiswa = Mahasiswa::all();
        // $mahasiswa = $mahasiswa->groupBy('role');
        // return view('admin.dt-mahasiswa', compact('mahasiswa'));
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

    public function dataMahasiswa()
    {
        $data_mhs = Mahasiswa::all();
        return view('admin.adm-dt-mahasiswa', compact('data_mhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request,[
            'email' => 'unique:user'
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Email sudah terdaftar');
            return redirect()->back()->withErrors($validator);
        } else {
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

                if (!$request->namaMahasiswa || $request->namaMahasiswa == "") {
                    Alert::error('Gagal', 'Nama Mahasiswa harus diisi');
                    return redirect()->back();
                }

                if (!$request->nim || $request->nim == "") {
                    Alert::error('Gagal', 'Nomor Induk harus diisi');
                    return redirect()->back();
                }

                if (!$request->angkatan || $request->angkatan == "") {
                    Alert::error('Gagal', 'Angkatan harus diisi');
                    return redirect()->back();
                }

                if (!$request->jenis_kelamin || $request->jenis_kelamin == "") {
                    Alert::error('Gagal', 'Jenis Kelamin harus diisi');
                    return redirect()->back();
                }

                if (!$request->no_hp || $request->no_hp == "") {
                    Alert::error('Gagal', 'Nomor HP harus diisi');
                    return redirect()->back();
                }

                $userMahasiswa = User::create([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role
                ]);

                $userMahasiswaId = $userMahasiswa->id_user;
                $emailMahasiswaId =$userMahasiswa->email;

                Mahasiswa::create([
                    'id_user' => $userMahasiswaId,
                    'nama' => $request->namaMahasiswa,
                    'nim' => $request->nim,
                    'angkatan' => $request->angkatan,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'email' => $emailMahasiswaId,
                    'no_hp' => $request->no_hp
                ]);

                Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
                return redirect()->back();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
