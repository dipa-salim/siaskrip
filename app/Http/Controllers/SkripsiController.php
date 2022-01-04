<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('skripsi');
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
        $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->id_user)->first();
        // dd($request->input("url_surat_dosen"));

        if (!$request->judul_skripsi || $request->judul_skripsi == "") {
            Alert::error('Maaf', 'Judul skripsi harus diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_biodata')) {
            Alert::error('Maaf', 'Lampiran Biodata Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_pkl')) {
            Alert::error('Maaf', 'Lampiran Surat Bukti PKL Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_pkm')) {
            Alert::error('Maaf', 'Lampiran Bukti PKM Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_ktm')) {
            Alert::error('Maaf', 'Lampiran SCAN KTM (Kartu Tanda Mahasiswa) Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_skripsi')) {
            Alert::error('Maaf', 'Lampiran Materi Skripsi Harus Diisi');
            return redirect()->back();
        }

        $fileNameBiodata = time() . '_' . $request->file('url_biodata')->getClientOriginalName();
        $fileNamePkl = time() . '_' . $request->file('url_pkl')->getClientOriginalName();
        $fileNamePkm = time() . '_' . $request->file('url_pkm')->getClientOriginalName();
        $fileNameKtm = time() . '_' . $request->file('url_ktm')->getClientOriginalName();
        $fileNameSkripsi = time() . '_' . $request->file('url_skripsi')->getClientOriginalName();


        $filePathBiodata = $request->file('url_biodata')->storeAs('uploads', $fileNameBiodata, 'public');
        $filePathPkl = $request->file('url_pkl')->storeAs('uploads', $fileNamePkl, 'public');
        $filePathPkm = $request->file('url_pkm')->storeAs('uploads', $fileNamePkm, 'public');
        $filePathKtm = $request->file('url_ktm')->storeAs('uploads', $fileNameKtm, 'public');
        $filePathSkripsi = $request->file('url_skripsi')->storeAs('uploads', $fileNameSkripsi, 'public');

        $url_biodata = '/storage/' . $filePathBiodata;
        $url_pkl = '/storage/' . $filePathPkl;
        $url_pkm = '/storage/' . $filePathPkm;
        $url_ktm = '/storage/' . $filePathKtm;
        $url_skripsi = '/storage/' . $filePathSkripsi;

        $insert = Skripsi::create([
            'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
            'judul_skripsi' => $request->judul_skripsi,
            'url_biodata' => $url_biodata,
            'url_pkl' => $url_pkl,
            'url_pkm' => $url_pkm,
            'url_ktm' => $url_ktm,
            'url_skripsi' => $url_skripsi,
            'status' => 'belum_approve_kaprodi'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function storeRevisi(Request $request)
    {
        $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->id_user)->first();
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

        $data_sebelumnya = Skripsi::where('status', 'approved')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        $fileNameRevisi = time() . '_' . $request->file('url_revisi')->getClientOriginalName();
        $filePathRevisi = $request->file('url_revisi')->storeAs('uploads', $fileNameRevisi, 'public');

        $url_revisi = '/storage/' . $filePathRevisi;

        $insert = Skripsi::create([
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
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function show(Skripsi $skripsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Skripsi $skripsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->hasFile('url_jadwal')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameJadwal = time() . '_' . $request->file('url_jadwal')->getClientOriginalName();
        $filePathJadwal = $request->file('url_jadwal')->storeAs('uploads', $fileNameJadwal, 'public');

        $url_jadwal = '/storage/' . $filePathJadwal;

        $update = Skripsi::where('id_skripsi', $id)->update([
            'url_jadwal' => $url_jadwal,
            'status' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateRevisi(Request $request, $id)
    {
        $update = Skripsi::where('id_skripsi', $id)->update([
            'status' => 'selesai'
        ]);
        Alert::success('Berhasil', 'Lampiran Berkas Mahasiswa diterima');
        return redirect()->back();
    }

    public function updateKaprodi(Request $request, $id)
    {
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

        $update = Skripsi::where('id_skripsi', $id)->update([
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
        if (!$request->dosen_pembimbing1 || $request->dosen_pembimbing1 == "") {
            Alert::error('Maaf', 'Dosen pembimbing 1 harus diisi');
            return redirect()->back();
        }

        if (!$request->dosen_pembimbing2 || $request->dosen_pembimbing2 == "") {
            Alert::error('Maaf', 'Dosen pembimbing 2 harus diisi');
            return redirect()->back();
        }

        $update = Skripsi::where('id_skripsi', $id)->update([
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
     * @param  \App\Models\Skripsi  $skripsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skripsi $skripsi)
    {
        //
    }

    public function hslskripsi()
    {
        return view('hsl-skripsi');
    }

    public function dtskripsi()
    {
        return view('admin.dt-skripsi');
    }

    public function admskripsi()
    {
        $skripsi = Skripsi::whereIn('status', ['approved_kaprodi', 'approved'])->get();
        return view('admin.adm-skripsi', [
            'data_skripsi' => $skripsi
        ]);
    }

    public function admhslskripsi()
    {
        $skripsi = Skripsi::whereIn('status', ['direvisi_kaprodi', 'selesai'])->get();
        return view('admin.adm-hsl-skripsi', [
            'data_selesai_skripsi' => $skripsi
        ]);
    }

    public function cancelSurat($id)
    {
        $update = Skripsi::where('id_skripsi', $id)->update([
            'status' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelRevisi($id)
    {
        $update = Skripsi::where('id_skripsi', $id)->update([
            'status' => 'belum_revisi'
        ]);
        Alert::success('Berhasil', 'File Berhasil Dibatalkan');
        return redirect()->back();
    }

    public function cancelKaprodi($id)
    {
        $update = Skripsi::where('id_skripsi', $id)->update([
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
        $update = Skripsi::where('id_skripsi', $id)->update([
            'status' => 'belum_revisi_kaprodi',
            'dosen_pembimbing1' => '',
            'dosen_pembimbing2' => ''
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    // public function countKaprodi()
    // {
    //     $skripsi = Skripsi::where('status', 'belum_approve_kaprodi')->count();
    //     $rvs_skripsi = Skripsi::where('status', 'belum_revisi_kaprodi')->count();
    //     return view('kaprodi.index', compact('skripsi', 'rvs_skripsi'));
    //
}
