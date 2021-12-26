<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Sempro;
use App\Models\Kaprodi;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class KaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_tugas = SuratTugas::where('status', 'belum_approve_kaprodi')->count();
        $surat_tugas_perpanjang = SuratTugas::where('status', 'belum_diperpanjang_kaprodi')->count();
        $sempro = Sempro::where('status', 'belum_approve_kaprodi')->count();
        $rvs_sempro = Sempro::where('status', 'belum_revisi_kaprodi')->count();
        $skripsi = Skripsi::where('status', 'belum_approve_kaprodi')->count();
        $rvs_skripsi = Skripsi::where('status', 'belum_revisi_kaprodi')->count();
        return view('kaprodi.index', compact('surat_tugas', 'surat_tugas_perpanjang', 'sempro', 'rvs_sempro', 'skripsi', 'rvs_skripsi'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kaprodi  $kaprodi
     * @return \Illuminate\Http\Response
     */
    public function show(Kaprodi $kaprodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kaprodi  $kaprodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kaprodi $kaprodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kaprodi  $kaprodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kaprodi $kaprodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kaprodi  $kaprodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kaprodi $kaprodi)
    {
        //
    }

    public function dataMhs()
    {
        $mahasiswa = Mahasiswa::all();
        return view('kaprodi.dt-mahasiswa', [
            'data_mahasiswa' => $mahasiswa
        ]);
    }

    public function dataDosen()
    {
        // $data_mahasiswa = DB::table('tb_mahasiswa AS tm');
        // $data_dosen = DB::table('tb_dosen AS td')->select('td.nip', 'td.nama', 'tmb.id_mahasiswa')
        //     // ->join('tb_surat_tugas AS tst', 'tm.id_mahasiswa', '=', 'tst.id_mahasiswa')
        //     ->join('tb_mhs_bimbingan AS tmb', 'tm.id_mahasiswa', '=', 'tmb.id_mahasiswa')->count()
        //     // ->where('tmb.id_dosen', $data_dosen->id_dosen)
        //     // // ->where('tmb.status', 1)
        //     // ->whereIn('tst.status', ['belum_approve', 'approved'])
        //     ->get();

        // return view('kaprodi.kpr-data-dosen', [
        //     'data_dosen' => $data_dosen
        // ]);

        $data_mhs = DB::table('tb_dosen AS td')->select('tmb.id_dosen','td.nama','td.nip', DB::raw('COALESCE(count(tmb.id_mahasiswa),0) AS jumlah_mahasiswa'))
                    ->leftJoin(DB::raw("(SELECT * FROM tb_mhs_bimbingan WHERE status_dospem = 'disetujui') tmb"), function($join) {
                        $join->on('td.id_dosen', '=', 'tmb.id_dosen');
                    })
                    // ->where('tmb.status_dospem', 'disetujui')
                    ->orderBy('jumlah_mahasiswa', 'desc')
                    ->groupBy('tmb.id_dosen', 'td.nama', 'td.nip')
                    ->get();

        // dd($data_mhs->toSql());
        return view('kaprodi.kpr-data-dosen',[
            'data_mhs' => $data_mhs
        ]);
    }

    public function kaprodiSrt()
    {
        $dosen = Dosen::all();

        $data_surat = SuratTugas::whereIn('status', ['belum_approve_kaprodi', 'approved_kaprodi'])->get();
        return view('kaprodi.kpr-srt-tugas', [
            'data_surat_kaprodi' => $data_surat,
            'dosen' => $dosen
        ]);
    }

    public function kaprodiSrtPerpanjang()
    {
        $dosen = Dosen::all();

        $surat_tugas_perpanjang = SuratTugas::whereIn('status', ['belum_diperpanjang_kaprodi', 'diperpanjang_kaprodi'])->get();
        return view('kaprodi.kpr-srt-perpanjangan', [
            'data_perpanjang_kaprodi' => $surat_tugas_perpanjang,
            'dosen' => $dosen
        ]);
    }

    public function kaprodiSempro()
    {
        $dosen = Dosen::all();

        $sempro = Sempro::whereIn('status', ['belum_approve_kaprodi', 'approved_kaprodi'])->get();
        return view('kaprodi.kpr-sempro', [
            'data_sempro_kaprodi' => $sempro,
            'dosen' => $dosen
        ]);
    }

    public function kaprodiRevisiSempro()
    {
        $dosen = Dosen::all();
        $rvsSempro = Sempro::whereIn('status', ['belum_revisi_kaprodi', 'direvisi_kaprodi'])->get();
        return view('kaprodi.kpr-srt-skripsi', [
            'data_surat_skripsi_kaprodi' => $rvsSempro,
            'dosen' => $dosen
        ]);
    }

    public function kaprodiSkripsi()
    {
        $dosen = Dosen::all();

        $skripsi = Skripsi::whereIn('status', ['belum_approve_kaprodi', 'approved_kaprodi'])->get();
        return view('kaprodi.kpr-skripsi', [
            'data_skripsi_kaprodi' => $skripsi,
            'dosen' => $dosen
        ]);
    }

    public function kaprodiRevisiSkripsi()
    {
        $dosen = Dosen::all();

        $rvsSkripsi = Skripsi::whereIn('status', ['belum_revisi_kaprodi', 'direvisi_kaprodi'])->get();
        return view('kaprodi.kpr-hsl-skripsi', [
            'data_selesai_skripsi_kaprodi' => $rvsSkripsi,
            'dosen' => $dosen
        ]);
    }
}
