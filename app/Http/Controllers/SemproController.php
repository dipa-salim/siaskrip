<?php

namespace App\Http\Controllers;

use App\Models\Sempro;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SemproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sempro');
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
        $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->email)->first();
        // dd($request->input("url_surat_dosen"));

        if (!$request->judul_skripsi || $request->judul_skripsi == "") {
            Alert::error('Maaf', 'Judul skripsi harus diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_lembar_dosen')) {
            Alert::error('Maaf', 'Lampiran Lembar Pengesahan Dosen Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_skripsi')) {
            Alert::error('Maaf', 'Lampiran Materi Proposal Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_dosen')->getClientOriginalName();
        $fileNameSkripsi = time() . '_' . $request->file('url_skripsi')->getClientOriginalName();
        $filePathLembar = $request->file('url_lembar_dosen')->storeAs('uploads', $fileNameLembar, 'public');
        $filePathSkripsi = $request->file('url_skripsi')->storeAs('uploads', $fileNameSkripsi, 'public');

        $url_lembar_dosen = '/storage/' . $filePathLembar;
        $url_skripsi = '/storage/' . $filePathSkripsi;

        $insert = Sempro::create([
            'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
            'judul_skripsi' => $request->judul_skripsi,
            'url_lembar_dosen' => $url_lembar_dosen,
            'url_skripsi' => $url_skripsi,
            'status' => 'belum_approve_kaprodi'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function storeRevisi(Request $request)
    {
        $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->email)->first();
        // dd($request->input("url_surat_dosen"));

        if (!$request->judul_skripsi || $request->judul_skripsi == "") {
            Alert::error('Gagal', 'Judul skripsi harus diisi');
            return redirect()->back();
        }

        if (!$request->catatan || $request->catatan == "") {
            Alert::error('Gagal', 'Catatan skripsi harus diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_revisi')) {
            Alert::error('Gagal', 'Lampiran Materi Revisi Harus Diisi');
            return redirect()->back();
        }

        $data_sebelumnya = Sempro::where('status', 'approved')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        $fileNameRevisi = time() . '_' . $request->file('url_revisi')->getClientOriginalName();
        $filePathRevisi = $request->file('url_revisi')->storeAs('uploads', $fileNameRevisi, 'public');

        $url_revisi = '/storage/' . $filePathRevisi;

        $insert = Sempro::create([
            'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
            'judul_skripsi' => $request->judul_skripsi,
            'catatan' => $request->catatan,
            'url_revisi' => $url_revisi,
            'id_surat_sebelumnya' => $data_sebelumnya->id_sempro,
            'status' => 'belum_revisi_kaprodi'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sempro  $sempro
     * @return \Illuminate\Http\Response
     */
    public function show(Sempro $sempro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sempro  $sempro
     * @return \Illuminate\Http\Response
     */
    public function edit(Sempro $sempro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sempro  $sempro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if (!$request->url_jadwal || $request->url_jadwal == "") {
        //     Alert::error('Gagal', 'File harus diisi');
        //     return redirect()->back();
        // }

        if (!$request->hasFile('url_jadwal')) {
            Alert::error('Gagal', 'File harus diisi');
            return redirect()->back();
        }

        $fileNameJadwal = time() . '_' . $request->file('url_jadwal')->getClientOriginalName();
        $filePathJadwal = $request->file('url_jadwal')->storeAs('uploads', $fileNameJadwal, 'public');

        $url_jadwal = '/storage/' . $filePathJadwal;

        $update = Sempro::where('id_sempro', $id)->update([
            'url_jadwal' => $url_jadwal,
            'status' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateRevisi(Request $request, $id)
    {
        if (!$request->hasFile('url_surat_skripsi')) {
            Alert::error('Gagal', 'File harus diisi');
            return redirect()->back();
        }

        $fileNameRevisi = time() . '_' . $request->file('url_surat_skripsi')->getClientOriginalName();
        $filePathRevisi = $request->file('url_surat_skripsi')->storeAs('uploads', $fileNameRevisi, 'public');

        $url_surat_skripsi = '/storage/' . $filePathRevisi;

        $update = Sempro::where('id_sempro', $id)->update([
            'url_surat_skripsi' => $url_surat_skripsi,
            'status' => 'direvisi'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateKaprodi(Request $request, $id)
    {
        // $fileNameTugas = time() . '_' . $request->file('url_surat_tugas')->getClientOriginalName();
        // $filePathTugas = $request->file('url_surat_tugas')->storeAs('uploads', $fileNameTugas, 'public');

        // $url_surat_tugas = '/storage/' . $filePathTugas;

        if (!$request->dosen_pembimbing1 || $request->dosen_pembimbing1 == "") {
            Alert::error('Maaf', 'Dosen pembimbing 1 harus diisi');
            return redirect()->back();
        }

        if (!$request->dosen_pembimbing2 || $request->dosen_pembimbing2 == "") {
            Alert::error('Maaf', 'Dosen pembimbing 2 harus diisi');
            return redirect()->back();
        }

        if (!$request->dosen_penguji1 || $request->dosen_penguji1 == "") {
            Alert::error('Maaf', 'Dosen penguji 1 harus diisi');
            return redirect()->back();
        }

        if (!$request->dosen_penguji2 || $request->dosen_penguji2 == "") {
            Alert::error('Maaf', 'Dosen penguji 2 harus diisi');
            return redirect()->back();
        }

        $update = Sempro::where('id_sempro', $id)->update([
            'dosen_pembimbing1' => $request->dosen_pembimbing1 == 0 ? $request->dosen_pembimbing1_text : $request->dosen_pembimbing1,
            'dosen_pembimbing2' => $request->dosen_pembimbing2 == 0 ? $request->dosen_pembimbing2_text : $request->dosen_pembimbing2,
            'dosen_penguji1' => $request->dosen_penguji1 == 0 ? $request->dosen_penguji1_text : $request->dosen_penguji1,
            'dosen_penguji2' => $request->dosen_penguji2 == 0 ? $request->dosen_penguji2_text : $request->dosen_penguji2,
            'status' => 'approved_kaprodi'
        ]);
        Alert::success('Berhasil', 'Data Berhasil Diupload');
        return redirect()->back();
    }

    public function updateKaprodiRevisi(Request $request, $id)
    {
        // $fileNameTugas = time() . '_' . $request->file('url_surat_tugas')->getClientOriginalName();
        // $filePathTugas = $request->file('url_surat_tugas')->storeAs('uploads', $fileNameTugas, 'public');

        // $url_surat_tugas = '/storage/' . $filePathTugas;
        if (!$request->dosen_pembimbing1 || $request->dosen_pembimbing1 == "") {
            Alert::error('Maaf', 'Dosen pembimbing 1 harus diisi');
            return redirect()->back();
        }

        if (!$request->dosen_pembimbing2 || $request->dosen_pembimbing2 == "") {
            Alert::error('Maaf', 'Dosen pembimbing 2 harus diisi');
            return redirect()->back();
        }

        $update = Sempro::where('id_sempro', $id)->update([
            'dosen_pembimbing1' => $request->dosen_pembimbing1 == 0 ? $request->dosen_pembimbing1_text : $request->dosen_pembimbing1,
            'dosen_pembimbing2' => $request->dosen_pembimbing2 == 0 ? $request->dosen_pembimbing2_text : $request->dosen_pembimbing2,
            'status' => 'direvisi_kaprodi'
        ]);
        Alert::success('Berhasil', 'Data Berhasil Diupload');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sempro  $sempro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sempro $sempro)
    {
        //
    }

    public function hslsempro()
    {
        return view('hsl-sempro');
    }

    public function admsempro()
    {
        $sempro = Sempro::whereIn('status', ['approved_kaprodi', 'approved'])->get();
        return view('admin.adm-sempro', [
            'data_sempro' => $sempro
        ]);
    }

    public function admhslsempro()
    {
        $sempro = Sempro::whereIn('status', ['direvisi_kaprodi', 'direvisi'])->get();
        return view('admin.adm-srt-skripsi', [
            'data_surat_skripsi' => $sempro
        ]);
    }

    public function cancelSurat($id)
    {
        $update = Sempro::where('id_sempro', $id)->update([
            'status' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'File Berhasil Dibatalkan');
        return redirect()->back();
    }

    public function cancelRevisi($id)
    {
        $update = Sempro::where('id_sempro', $id)->update([
            'status' => 'belum_revisi'
        ]);
        Alert::success('Berhasil', 'File Berhasil Dibatalkan');
        return redirect()->back();
    }

    public function cancelKaprodi($id)
    {
        $update = Sempro::where('id_sempro', $id)->update([
            'status' => 'belum_approve_kaprodi',
            'dosen_pembimbing1' => '',
            'dosen_pembimbing2' => '',
            'dosen_penguji1' => '',
            'dosen_penguji2' => ''
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelKaprodiRevisi($id)
    {
        $update = Sempro::where('id_sempro', $id)->update([
            'status' => 'belum_revisi_kaprodi',
            'dosen_pembimbing1' => '',
            'dosen_pembimbing2' => ''
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    // public function countKaprodi()
    // {
    //     $sempro = Sempro::where('status', 'belum_approve_kaprodi')->count();
    //     $rvs_sempro = Sempro::where('status', 'belum_revisi_kaprodi')->count();
    //     return view('kaprodi.index', compact('sempro', 'rvs_sempro'));
    // }
}
