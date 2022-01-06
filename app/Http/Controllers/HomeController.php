<?php

namespace App\Http\Controllers;



use App\Models\Sempro;
use App\Models\Skripsi;
use App\Models\Mahasiswa;
use App\Models\SuratTugas;
use App\Models\MhsBimbingan;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dshadm()
    {
        $surat_tugas = SuratTugas::where('status', 'approved_kaprodi')->count();
        $surat_tugas_perpanjang = SuratTugas::where('status', 'diperpanjang_kaprodi')->count();
        $sempro = Sempro::where('status', 'approved_kaprodi')->count();
        $rvs_sempro = Sempro::where('status', 'direvisi_kaprodi')->count();
        $skripsi = Skripsi::where('status', 'approved_kaprodi')->count();
        $rvs_skripsi = Skripsi::where('status', 'direvisi_kaprodi')->count();
        return view('admin.index', compact('surat_tugas', 'surat_tugas_perpanjang', 'sempro', 'rvs_sempro', 'skripsi', 'rvs_skripsi'));
    }

    public function progres()
    {
        return view('progres-skripsi');
    }

    public function notif()
    {
        $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->id_user)->first();

        $data_surat = SuratTugas::where('status', 'approved')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();
        $data_perpanjangan = SuratTugas::where('status', 'diperpanjang')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        $jadwal_sempro = Sempro::where('status', 'approved')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();
        $surat_skripsi = Sempro::where('status', 'direvisi')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        $jadwal_skripsi = Skripsi::where('status', 'approved')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        $lembar_dosen = MhsBimbingan::whereIn('status_surat_tugas', ['approved', 'approved_kaprodi'])->whereNotIn('status_dospem', ['dibatalkan', 'belum_disetujui'])->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->get();
        $setuju_sempro = MhsBimbingan::whereIn('status_sempro', ['approved', 'approved_kaprodi'])->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();
        $rvs_sempro = MhsBimbingan::whereIn('status_surat_skripsi', ['approved', 'approved_kaprodi'])->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();
        $setuju_skripsi = MhsBimbingan::whereIn('status_skripsi', ['approved', 'approved_kaprodi'])->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();
        $rvs_skripsi = MhsBimbingan::whereIn('status_hasil_skripsi', ['approved', 'approved_kaprodi'])->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        return view('pemberitahuan', [
            'data_surat' => $data_surat,
            'data_perpanjangan' => $data_perpanjangan,
            'jadwal_sempro' => $jadwal_sempro,
            'surat_skripsi' => $surat_skripsi,
            'jadwal_skripsi' => $jadwal_skripsi,
            'lembar_dosen' => $lembar_dosen,
            'setuju_sempro' => $setuju_sempro,
            'rvs_sempro' => $rvs_sempro,
            'setuju_skripsi' => $setuju_skripsi,
            'rvs_skripsi' => $rvs_skripsi
        ]);
    }

}
