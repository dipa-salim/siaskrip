<?php

namespace App\Http\Controllers;


use DB;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\SuratTugas;
use App\Models\MhsBimbingan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class SuratTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat-tugas');
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

    // public function store(Request $request)
    // {
    //     $data_mahasiswa = Mahasiswa::where('email', auth()->user()->email)->first();
    //     // dd($request->input("url_surat_dosen"));

    //     if (!$request->judul_skripsi || $request->judul_skripsi == "") {
    //         Alert::error('Maaf', 'Judul skripsi harus diisi');
    //         return redirect()->back();
    //     }

    //     if (!$request->hasFile('url_bab1')) {
    //         Alert::error('Maaf', 'Lampiran Bab 1 Harus Diisi');
    //         return redirect()->back();
    //     }

    //     if (!$request->hasFile('url_surat_dosen')) {
    //         Alert::error('Maaf', 'Lampiran Surat Pernyataan Dosen Pembimbing Harus Diisi');
    //         return redirect()->back();
    //     }

    //     $fileNameBab1 = time() . '_' . $request->file('url_bab1')->getClientOriginalName();
    //     $fileNameDosen = time() . '_' . $request->file('url_surat_dosen')->getClientOriginalName();
    //     $filePathBab1 = $request->file('url_bab1')->storeAs('uploads', $fileNameBab1, 'public');
    //     $filePathDosen = $request->file('url_surat_dosen')->storeAs('uploads', $fileNameDosen, 'public');

    //     $url_bab1 = '/storage/' . $filePathBab1;
    //     $url_surat_dosen = '/storage/' . $filePathDosen;

    //     $insert = SuratTugas::create([
    //         'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
    //         'judul_skripsi' => $request->judul_skripsi,
    //         'url_bab1' => $url_bab1,
    //         'url_surat_dosen' => $url_surat_dosen,
    //         'status' => 'belum_approve'
    //     ]);

    //     Alert::success('Berhasil', 'File Berhasil Diupload');
    //     return redirect()->back();
    // }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data_mahasiswa = Mahasiswa::where('email', auth()->user()->email)->first();
            // dd($data_mahasiswa);

            if (!$request->judul_skripsi || $request->judul_skripsi == "") {
                Alert::error('Gagal', 'Judul skripsi harus diisi');
                return redirect()->back();
            }

            if (!$request->hasFile('url_bab1')) {
                Alert::error('Gagal', 'Lampiran Bab 1 Harus Diisi');
                return redirect()->back();
            }

            $url_surat_dosen = NULL;

            if ($request->hasFile('url_surat_dosen')) {
                $fileNameDosen = time() . '_' . $request->file('url_surat_dosen')->getClientOriginalName();
                $filePathDosen = $request->file('url_surat_dosen')->storeAs('uploads', $fileNameDosen, 'public');
                $url_surat_dosen = '/storage/' . $filePathDosen;
            }

            $fileNameBab1 = time() . '_' . $request->file('url_bab1')->getClientOriginalName();
            $filePathBab1 = $request->file('url_bab1')->storeAs('uploads', $fileNameBab1, 'public');

            $url_bab1 = '/storage/' . $filePathBab1;

            $insert = SuratTugas::create([
                'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
                'judul_skripsi' => $request->judul_skripsi,
                'url_bab1' => $url_bab1,
                'url_surat_dosen' => $url_surat_dosen,
                'status' => 'belum_approve_kaprodi'
            ]);

            if ($request->hasFile('url_surat_dosen')) {
                $update = MhsBimbingan::where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->whereNotIn('status_dospem', ['dibatalkan'])->update([
                    'id_surat_tugas' => $insert->id
                ]);
            }

            DB::commit();
            Alert::success('Berhasil', 'File Berhasil Diupload');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Alert::error('Gagal', $e->getMessage());
            return redirect()->back();
        }
    }

    public function storePerpanjang(Request $request)
    {
        $data_mahasiswa = Mahasiswa::where('email', auth()->user()->email)->first();
        // dd($request->input("url_surat_dosen"));

        $data_sebelumnya = SuratTugas::where('status', 'approved')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        if (!$request->judul_skripsi || $request->judul_skripsi == "") {
            Alert::error('Maaf', 'Judul skripsi harus diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_bab1')) {
            Alert::error('Maaf', 'Lampiran Bab 1 Harus Diisi');
            return redirect()->back();
        }

        $fileNameBab1 = time() . '_' . $request->file('url_bab1')->getClientOriginalName();
        $filePathBab1 = $request->file('url_bab1')->storeAs('uploads', $fileNameBab1, 'public');

        $url_bab1 = '/storage/' . $filePathBab1;

        $insert = SuratTugas::create([
            'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
            'judul_skripsi' => $request->judul_skripsi,
            'url_bab1' => $url_bab1,
            'status' => 'belum_diperpanjang_kaprodi',
            'id_surat_sebelumnya' => $data_sebelumnya->id_surat_tugas
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function show(SuratTugas $suratTugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratTugas $suratTugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */

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

        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'dosen_pembimbing1' => $request->dosen_pembimbing1 == 0 ? $request->dosen_pembimbing1_text : $request->dosen_pembimbing1,
            'dosen_pembimbing2' => $request->dosen_pembimbing2 == 0 ? $request->dosen_pembimbing2_text : $request->dosen_pembimbing2,
            'status' => 'approved_kaprodi'
        ]);

        $dataSurat = SuratTugas::where('id_surat_tugas', $id)->first();

        if ($dataSurat->url_surat_dosen) {
            $update = MhsBimbingan::where('id_mahasiswa', $dataSurat->id_mahasiswa)->whereIn('status_dospem', ['disetujui'])->update([
                'id_surat_tugas' => $id,
                'status_surat_tugas' => 'approved_kaprodi'
            ]);
        } else {
            $insert = MhsBimbingan::insert([
                [
                    'id_surat_tugas' => $id,
                    'id_mahasiswa' => $request->mahasiswa,
                    'id_dosen' => $request->dosen_pembimbing1 == 0 ? $request->dosen_pembimbing1_text : $request->dosen_pembimbing1,
                    'status_dospem' => 'disetujui',
                    'judul_skripsi' => $dataSurat->judul_skripsi,
                    'created_at' => date('Y-m-d H:i:s'),
                    'url_surat_dosen' => $dataSurat->url_surat_dosen,
                    'url_bab1' => $dataSurat->url_bab1,
                    'status_surat_tugas' => $dataSurat->status
                ],
                [
                    'id_surat_tugas' => $id,
                    'id_mahasiswa' => $request->mahasiswa,
                    'id_dosen' => $request->dosen_pembimbing2 == 0 ? $request->dosen_pembimbing2_text : $request->dosen_pembimbing2,
                    'status_dospem' => 'disetujui',
                    'judul_skripsi' => $dataSurat->judul_skripsi,
                    'created_at' => date('Y-m-d H:i:s'),
                    'url_surat_dosen' => $dataSurat->url_surat_dosen,
                    'url_bab1' => $dataSurat->url_bab1,
                    'status_surat_tugas' => $dataSurat->status
                ]
            ]);
        }

        Alert::success('Berhasil', 'Data Berhasil Diupload');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        if (!$request->hasFile('url_surat_tugas')) {
            Alert::error('Gagal', 'File harus diisi');
            return redirect()->back();
        }

        $fileNameTugas = time() . '_' . $request->file('url_surat_tugas')->getClientOriginalName();
        $filePathTugas = $request->file('url_surat_tugas')->storeAs('uploads', $fileNameTugas, 'public');

        $url_surat_tugas = '/storage/' . $filePathTugas;

        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'url_surat_tugas' => $url_surat_tugas,
            'status' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }


    public function updateKaprodiPerpanjang(Request $request, $id)
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

        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'dosen_pembimbing1' => $request->dosen_pembimbing1 == 0 ? $request->dosen_pembimbing1_text : $request->dosen_pembimbing1,
            'dosen_pembimbing2' => $request->dosen_pembimbing2 == 0 ? $request->dosen_pembimbing2_text : $request->dosen_pembimbing2,
            'status' => 'diperpanjang_kaprodi'
        ]);
        Alert::success('Berhasil', 'Data Berhasil Diupload');
        return redirect()->back();
    }


    public function updatePerpanjang(Request $request, $id)
    {
        if (!$request->hasFile('url_surat_tugas')) {
            Alert::error('Gagal', 'File harus diisi');
            return redirect()->back();
        }

        $fileNameTugas = time() . '_' . $request->file('url_surat_tugas')->getClientOriginalName();
        $filePathTugas = $request->file('url_surat_tugas')->storeAs('uploads', $fileNameTugas, 'public');

        $url_surat_tugas = '/storage/' . $filePathTugas;

        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'url_surat_tugas' => $url_surat_tugas,
            'status' => 'diperpanjang'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratTugas  $suratTugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratTugas $suratTugas)
    {
        //
    }

    public function perpanjangan()
    {
        $data_mahasiswa = Mahasiswa::where('email', auth()->user()->email)->first();
        $surat_perpanjang = SuratTugas::where('status', 'approved')->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->get();
        return view('srt-perpanjangan', [
            'data_surat_perpanjang' => $surat_perpanjang
        ]);
    }

    public function admsrt()
    {
        $surat_tugas = SuratTugas::whereIn('status', ['approved_kaprodi', 'approved'])->get();
        return view('admin.adm-srt', [
            'data_surat' => $surat_tugas
        ]);
    }

    public function admperpanjangan()
    {
        $surat_tugas_perpanjang = SuratTugas::whereIn('status', ['diperpanjang_kaprodi', 'diperpanjang'])->get();
        return view('admin.adm-srt-perpanjangan', [
            'data_perpanjang' => $surat_tugas_perpanjang
        ]);
    }

    public function cancelKaprodi($id)
    {
        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'status' => 'belum_approve_kaprodi',
            'dosen_pembimbing1' => '',
            'dosen_pembimbing2' => ''
        ]);

        // $dataIdMhs = SuratTugas::select('id_mahasiswa')->where('id_surat_tugas', $id)->first();
        // $dataIdMhs = $dataIdMhs->id_mahasiswa;

        $updateBimbingan = MhsBimbingan::where('id_surat_tugas', $id)->where('status_dospem', '<>', 'belum_disetujui')->update([
            'status_dospem' => 'dibatalkan'
        ]);

        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelSurat($id)
    {
        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'status' => 'approved_kaprodi'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelKaprodiPerpanjang($id)
    {
        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'status' => 'belum_diperpanjang_kaprodi',
            'dosen_pembimbing1' => '',
            'dosen_pembimbing2' => ''
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelPerpanjang($id)
    {
        $update = SuratTugas::where('id_surat_tugas', $id)->update([
            'status' => 'belum_diperpanjang'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    // public function countKaprodiSrt()
    // {
    //     $surat_tugas = SuratTugas::where('status', 'belum_approve_kaprodi')->count();
    //     // $surat_tugas_perpanjang = SuratTugas::where('status', 'belum_diperpanjang_kaprodi')->count();
    //     return view('kaprodi.index', compact('surat_tugas'));
    // }

    // public function countKaprodiPerpanjang()
    // {
    //     // $surat_tugas = SuratTugas::where('status', 'belum_approve_kaprodi')->count();
    //     $surat_tugas_perpanjang = SuratTugas::where('status', 'belum_diperpanjang_kaprodi')->count();
    //     return view('kaprodi.index', compact('surat_tugas_perpanjang'));
    // }


    // public function dataDospem()
    // {
    //     $dosen = Dosen::all();
    //     return view('kaprodi.kpr-srt-tugas', compact('dosen'));
    // }
}
