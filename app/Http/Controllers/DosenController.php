<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Dosen;
use App\Models\MhsBimbingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::where('id_user', auth()->user()->email)->first();

        $surat_tugas = MhsBimbingan::where('status_surat_tugas', 'belum_approve')->where('id_dosen',$dosen->id_dosen)->count();
        $sempro = MhsBimbingan::where('status_sempro', 'belum_approve')->where('id_dosen',$dosen->id_dosen)->count();
        $rvs_sempro = MhsBimbingan::where('status_surat_skripsi', 'belum_approve')->where('id_dosen',$dosen->id_dosen)->count();
        $skripsi = MhsBimbingan::where('status_skripsi', 'belum_approve')->where('id_dosen',$dosen->id_dosen)->count();
        $rvs_skripsi = MhsBimbingan::where('status_hasil_skripsi', 'belum_approve')->where('id_dosen',$dosen->id_dosen)->count();
        return view('dosen.index', compact('surat_tugas', 'sempro', 'rvs_sempro', 'skripsi', 'rvs_skripsi'));
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

    public function dataDosen()
    {
        $data_dosen = DB::table('tb_mhs_bimbingan AS tmb')->select('tmb.id_dosen','td.id_user','td.nama','td.nip', DB::raw('COALESCE(count(tmb.id_mahasiswa),0) AS jumlah_mahasiswa'))
                        ->rightjoin('tb_dosen AS td', 'td.id_dosen', '=', 'tmb.id_dosen')
                        ->orderBy('td.id_user', 'asc')
                        ->where('tmb.status_dospem', 'disetujui')
                        ->groupBy('tmb.id_dosen','td.id_user', 'td.nama', 'td.nip')
                        ->get();

            return view('admin.adm-dt-dosen', compact('data_dosen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
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

            if (!$request->namaDosen || $request->namaDosen == "") {
                Alert::error('Gagal', 'Nama Dosen harus diisi');
                return redirect()->back();
            }

            if (!$request->nip || $request->nip == "") {
                Alert::error('Gagal', 'Nomor Induk harus diisi');
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


            $userDosen = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            $userDosenId = $userDosen->id_user;
            $emailDosenId = $userDosen->email;

            Dosen::create([
                'id_user' => $userDosenId,
                'nama' => $request->namaDosen,
                'nip' => $request->nip,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $emailDosenId,
                'no_hp' => $request->no_hp
            ]);

            Alert::success('Berhasil', 'File Berhasil Diupload');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_dosen')->where('id_dosen',$id)->delete();

        Alert::success('Berhasil', 'File Berhasil Dihapus');
        return redirect()->back();
    }


    // Halaman Dosen
    public function mhsBimbingan()
    {
        $data_dosen = Dosen::where('id_user', auth()->user()->email)->first();
        $data_mahasiswa = DB::table('tb_mahasiswa AS tm')->select('tm.nim', 'tm.nama', 'tm.angkatan', 'tmb.judul_skripsi')
            ->join('tb_surat_tugas AS tst', 'tm.id_mahasiswa', '=', 'tst.id_mahasiswa')
            ->join('tb_mhs_bimbingan AS tmb', 'tm.id_mahasiswa', '=', 'tmb.id_mahasiswa')
            ->where('tmb.id_dosen', $data_dosen->id_dosen)
            ->where('tmb.status_dospem', 'disetujui')
            // ->whereIn('tst.status', ['belum_approve', 'approved'])
            ->get();

        return view('dosen.dt-mhs-bimbingan', [
            'data_mahasiswa' => $data_mahasiswa
        ]);
    }

    // public function approvalLogbook()
    // {
    //     return view('dosen.dosen-logbook');
    // }

    public function pengajuanMahasiswa()
    {
        $dosen = Dosen::where('id_user', auth()->user()->email)->first();
        $surat_pengajuan = MhsBimbingan::whereIn('status_surat_tugas', ['belum_approve', 'approved'])->where('id_dosen', $dosen->id_dosen)->get();
        return view('dosen.pengajuan-mhs', [
            'data_pengajuan' => $surat_pengajuan
        ]);
    }

    public function semproDosen()
    {
        $dosen = Dosen::where('id_user', auth()->user()->email)->first();
        $surat_pengajuan = MhsBimbingan::whereIn('status_sempro', ['belum_approve', 'approved'])->where('id_dosen', $dosen->id_dosen)->get();
        return view('dosen.dosen-sempro', [
            'data_dosen_sempro' => $surat_pengajuan
        ]);
    }

    public function revisiSempro()
    {
        $dosen = Dosen::where('id_user', auth()->user()->email)->first();
        $surat_pengajuan = MhsBimbingan::whereIn('status_surat_skripsi', ['belum_approve', 'approved'])->where('id_dosen', $dosen->id_dosen)->get();
        return view('dosen.dosen-rvs-sempro', [
            'data_rvs_sempro' => $surat_pengajuan
        ]);
    }

    public function skripsiDosen()
    {
        $dosen = Dosen::where('id_user', auth()->user()->email)->first();
        $surat_pengajuan = MhsBimbingan::whereIn('status_skripsi', ['belum_approve', 'approved'])->where('id_dosen', $dosen->id_dosen)->get();
        return view('dosen.dosen-skripsi', [
            'data_dosen_skripsi' => $surat_pengajuan
        ]);
    }

    public function revisiSkripsi()
    {
        $dosen = Dosen::where('id_user', auth()->user()->email)->first();
        $surat_pengajuan = MhsBimbingan::whereIn('status_hasil_skripsi', ['belum_approve', 'approved'])->where('id_dosen', $dosen->id_dosen)->get();
        return view('dosen.dosen-rvs-skripsi', [
            'data_rvs_skripsi' => $surat_pengajuan
        ]);
    }
}
