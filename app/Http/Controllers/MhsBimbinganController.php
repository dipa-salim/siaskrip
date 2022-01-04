<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MhsBimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;


class MhsBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        // $data_dosen = Dosen::where('id_dosen', auth()->user()->id_user)->first();

        if (!$request->judul_skripsi || $request->judul_skripsi == "") {
            Alert::error('Maaf', 'Judul skripsi harus diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_bab1')) {
            Alert::error('Maaf', 'Lampiran Bab 1 Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_surat_dosen')) {
            Alert::error('Maaf', 'Lampiran Surat Pernyataan Dosen Pembimbing Harus Diisi');
            return redirect()->back();
        }

        $fileNameBab1 = time() . '_' . $request->file('url_bab1')->getClientOriginalName();
        $fileNameDosen = time() . '_' . $request->file('url_surat_dosen')->getClientOriginalName();
        $filePathBab1 = $request->file('url_bab1')->storeAs('uploads', $fileNameBab1, 'public');
        $filePathDosen = $request->file('url_surat_dosen')->storeAs('uploads', $fileNameDosen, 'public');

        $url_bab1 = '/storage/' . $filePathBab1;
        $url_surat_dosen = '/storage/' . $filePathDosen;

        $insert = MhsBimbingan::create([
            'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
            'id_dosen' => $request->id_dosen,
            'judul_skripsi' => $request->judul_skripsi,
            'url_bab1' => $url_bab1,
            'url_surat_dosen' => $url_surat_dosen,
            'status_dospem' => 'belum_disetujui',
            'status_surat_tugas' => 'belum_approve'
        ]);

        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MhsBimbingan  $mhsBimbingan
     * @return \Illuminate\Http\Response
     */
    public function show(MhsBimbingan $mhsBimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MhsBimbingan  $mhsBimbingan
     * @return \Illuminate\Http\Response
     */
    public function edit(MhsBimbingan $mhsBimbingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MhsBimbingan  $mhsBimbingan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->hasFile('url_surat_dosen_ttd')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameTtd = time() . '_' . $request->file('url_surat_dosen_ttd')->getClientOriginalName();
        $filePathTtd = $request->file('url_surat_dosen_ttd')->storeAs('uploads', $fileNameTtd, 'public');

        $url_surat_dosen_ttd = '/storage/' . $filePathTtd;

        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_surat_dosen_ttd' => $url_surat_dosen_ttd,
            'status_dospem' => 'disetujui',
            'status_surat_tugas' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateSempro(Request $request, $id)
    {
        // if (!$request->url_lembar_sempro || $request->url_lembar_sempro == "") {
        //     Alert::error('Gagal', 'Judul skripsi harus diisi');
        //     return redirect()->back();
        // }

        if (!$request->hasFile('url_lembar_sempro')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_logbook_sempro')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_proposal')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_sempro')->getClientOriginalName();
        $fileNameLogbook = time() . '_' . $request->file('url_logbook_sempro')->getClientOriginalName();
        $fileNameProposal = time() . '_' . $request->file('url_proposal')->getClientOriginalName();
        $filePathLembar = $request->file('url_lembar_sempro')->storeAs('uploads', $fileNameLembar, 'public');
        $filePathLogbook = $request->file('url_logbook_sempro')->storeAs('uploads', $fileNameLogbook, 'public');
        $filePathProposal = $request->file('url_proposal')->storeAs('uploads', $fileNameProposal, 'public');

        $url_lembar_sempro = '/storage/' . $filePathLembar;
        $url_logbook_sempro = '/storage/' . $filePathLogbook;
        $url_proposal = '/storage/' . $filePathProposal;


        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_sempro' => $url_lembar_sempro,
            'url_logbook_sempro' => $url_logbook_sempro,
            'url_proposal' => $url_proposal,
            'status_sempro' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateDosenSempro(Request $request, $id)
    {
        if (!$request->hasFile('url_lembar_sempro_ttd')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_logbook_sempro_ttd')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_sempro_ttd')->getClientOriginalName();
        $fileNameLogbook = time() . '_' . $request->file('url_logbook_sempro_ttd')->getClientOriginalName();
        $filePathLembarTtd = $request->file('url_lembar_sempro_ttd')->storeAs('uploads', $fileNameLembar, 'public');
        $filePathLogbookTtd = $request->file('url_lembar_sempro_ttd')->storeAs('uploads', $fileNameLogbook, 'public');

        $url_lembar_sempro_ttd = '/storage/' . $filePathLembarTtd;
        $url_logbook_sempro_ttd = '/storage/' . $filePathLogbookTtd;


        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_sempro_ttd' => $url_lembar_sempro_ttd,
            'url_logbook_sempro_ttd' => $url_logbook_sempro_ttd,
            'status_sempro' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateRvsSempro(Request $request, $id)
    {
        if (!$request->hasFile('url_lembar_sempro')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_proposal')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_sempro')->getClientOriginalName();
        $fileNameProposal = time() . '_' . $request->file('url_proposal')->getClientOriginalName();
        $filePathLembar = $request->file('url_lembar_sempro')->storeAs('uploads', $fileNameLembar, 'public');
        $filePathProposal = $request->file('url_proposal')->storeAs('uploads', $fileNameProposal, 'public');

        $url_lembar_sempro = '/storage/' . $filePathLembar;
        $url_proposal = '/storage/' . $filePathProposal;


        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_sempro' => $url_lembar_sempro,
            'url_proposal' => $url_proposal,
            'status_surat_skripsi' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateDosenRvsSempro(Request $request, $id)
    {
        if (!$request->hasFile('url_lembar_sempro_ttd')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_sempro_ttd')->getClientOriginalName();
        $filePathLembarTtd = $request->file('url_lembar_sempro_ttd')->storeAs('uploads', $fileNameLembar, 'public');

        $url_lembar_sempro_ttd = '/storage/' . $filePathLembarTtd;


        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_sempro_ttd' => $url_lembar_sempro_ttd,
            'status_surat_skripsi' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateSkripsi(Request $request, $id)
    {
        if (!$request->hasFile('url_lembar_skripsi')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_logbook_skripsi')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_skripsi')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_skripsi')->getClientOriginalName();
        $fileNameLogbook = time() . '_' . $request->file('url_logbook_skripsi')->getClientOriginalName();
        $fileNameSkripsi = time() . '_' . $request->file('url_skripsi')->getClientOriginalName();
        $filePathLembar = $request->file('url_lembar_skripsi')->storeAs('uploads', $fileNameLembar, 'public');
        $filePathLogbook = $request->file('url_logbook_skripsi')->storeAs('uploads', $fileNameLogbook, 'public');
        $filePathSkripsi = $request->file('url_skripsi')->storeAs('uploads', $fileNameSkripsi, 'public');

        $url_lembar_skripsi = '/storage/' . $filePathLembar;
        $url_logbook_skripsi = '/storage/' . $filePathLogbook;
        $url_skripsi = '/storage/' . $filePathSkripsi;


        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_skripsi' => $url_lembar_skripsi,
            'url_logbook_skripsi' => $url_logbook_skripsi,
            'url_skripsi' => $url_skripsi,
            'status_skripsi' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateDosenSkripsi(Request $request, $id)
    {
        if (!$request->hasFile('url_lembar_skripsi_ttd')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        if (!$request->hasFile('url_logbook_skripsi_ttd')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_skripsi_ttd')->getClientOriginalName();
        $fileNameLogbook = time() . '_' . $request->file('url_logbook_skripsi_ttd')->getClientOriginalName();
        $filePathLembarTtd = $request->file('url_lembar_skripsi_ttd')->storeAs('uploads', $fileNameLembar, 'public');
        $filePathLogbookTtd = $request->file('url_lembar_skripsi_ttd')->storeAs('uploads', $fileNameLogbook, 'public');

        $url_lembar_skripsi_ttd = '/storage/' . $filePathLembarTtd;
        $url_logbook_skripsi_ttd = '/storage/' . $filePathLogbookTtd;

        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_skripsi_ttd' => $url_lembar_skripsi_ttd,
            'url_logbook_skripsi_ttd' => $url_logbook_skripsi_ttd,
            'status_skripsi' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateRvsSkripsi(Request $request, $id)
    {
        if (!$request->hasFile('url_lembar_skripsi')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }
        if (!$request->hasFile('url_skripsi')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_skripsi')->getClientOriginalName();
        $fileNameSkripsi = time() . '_' . $request->file('url_skripsi')->getClientOriginalName();
        $filePathLembar = $request->file('url_lembar_skripsi')->storeAs('uploads', $fileNameLembar, 'public');
        $filePathSkripsi = $request->file('url_skripsi')->storeAs('uploads', $fileNameSkripsi, 'public');

        $url_lembar_skripsi = '/storage/' . $filePathLembar;
        $url_skripsi = '/storage/' . $filePathSkripsi;


        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_skripsi' => $url_lembar_skripsi,
            'url_skripsi' => $url_skripsi,
            'status_hasil_skripsi' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }

    public function updateDosenRvsSkripsi(Request $request, $id)
    {
        if (!$request->hasFile('url_lembar_skripsi_ttd')) {
            Alert::error('Gagal', 'File Harus Diisi');
            return redirect()->back();
        }

        $fileNameLembar = time() . '_' . $request->file('url_lembar_skripsi_ttd')->getClientOriginalName();
        $filePathLembarTtd = $request->file('url_lembar_skripsi_ttd')->storeAs('uploads', $fileNameLembar, 'public');

        $url_lembar_skripsi_ttd = '/storage/' . $filePathLembarTtd;


        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'url_lembar_skripsi_ttd' => $url_lembar_skripsi_ttd,
            'status_hasil_skripsi' => 'approved'
        ]);
        Alert::success('Berhasil', 'File Berhasil Diupload');
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MhsBimbingan  $mhsBimbingan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MhsBimbingan $mhsBimbingan)
    {
        //
    }

    // Halaman Mahasiswa

    public function dosenPembimbing()
    {
        $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->id_user)->first();
        // dd($request->input("url_surat_dosen"));

        // $data_dosen = DB::table('tb_dosen AS td')->select('td.nip', 'td.nama')
        //     ->join('tb_mhs_bimbingan AS tmb', 'td.id_dosen', '=', 'tmb.id_mahasiswa')
        //     ->where('tmb.id_mahasiswa', $data_mahasiswa->id_mahasiswa)
        //     ->get();
        // return view('mhs-dosen-pembimbing', [
        //     'data_dosen' => $data_dosen
        // ]);

        $data_dosen = Dosen::all();
        return view('mhs-dosen-pembimbing', [
            'data_dosen' => $data_dosen
        ]);
    }

    public function dosenSempro()
    {
        $data_dosen = Dosen::all();
        $data_mhs = MhsBimbingan::all();
        return view('mhs-dosen-sempro', compact('data_dosen','data_mhs'));
    }

    public function dosenRevisiSempro()
    {
        $data_dosen = Dosen::all();
        $data_mhs = MhsBimbingan::all();
        return view('mhs-dosen-rvs-sempro', compact('data_dosen','data_mhs') );
    }

    public function dosenSkripsi()
    {
        $data_dosen = Dosen::all();
        $data_mhs = MhsBimbingan::all();
        return view('mhs-dosen-skripsi', compact('data_dosen','data_mhs'));
    }

    public function dosenRevisiSkripsi()
    {
        $data_dosen = Dosen::all();
        $data_mhs = MhsBimbingan::all();
        return view('mhs-dosen-rvs-skripsi', compact('data_dosen','data_mhs'));
    }

    public function cancelSurat($id)
    {
        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'status_surat_tugas' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelSempro($id)
    {
        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'status_sempro' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelRvsSempro($id)
    {
        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'status_surat_skripsi' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelSkripsi($id)
    {
        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'status_skripsi' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }

    public function cancelRvsSkripsi($id)
    {
        $update = MhsBimbingan::where('id_mhs_bimbingan', $id)->update([
            'status_hasil_skripsi' => 'belum_approve'
        ]);
        Alert::success('Berhasil', 'Unggahan berhasil dibatalkan');
        return redirect()->back();
    }
}
