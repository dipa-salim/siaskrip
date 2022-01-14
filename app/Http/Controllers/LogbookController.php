<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use App\Models\MhsBimbingan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LogbookController extends Controller
{
    public function index()
    {
        $logbook = Logbook::where('status', 'success')->get();
        return view('logbook',[
            'data_logbook' => $logbook
        ]);
    }

    public function addlogbook()
    {
        return view('add-logbook');
    }

    public function store(Request $request)
    {
        if (!$request->tanggal || $request->tanggal == "") {
            Alert::error('Gagal', 'Kolom harus diisi');
            return redirect()->back();
        }

        if (!$request->materi || $request->materi == "") {
            Alert::error('Gagal', 'Kolom harus diisi');
            return redirect()->back();
        }

        $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->email)->first();

        $insert = Logbook::create([
            'id_mahasiswa' => $data_mahasiswa->id_mahasiswa,
            'tanggal' => $request->tanggal,
            'materi' => $request->materi,
            'status' => 'success'
        ]);

        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect('/logbook');
    }

    public function destroy($id)
    {
        DB::table('tb_logbook')->where('id_logbook',$id)->delete();

        Alert::success('Berhasil', 'File Berhasil Dihapus');
        return redirect()->back();
    }

    public function cetak()
    {
        // $data_mahasiswa = Mahasiswa::where('id_user', auth()->user()->email)->first();
        // $data = DB::table('tb_logbook');
        // ->where('id_mahasiswa', $data_mahasiswa->id_mahasiswa)->first();

        $mahasiswa = Mahasiswa::where('id_user', auth()->user()->email)->first();
        $dospem = MhsBimbingan::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->where('status_dospem','disetujui')->get();
        $catatan = Logbook::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();


        $pdf = PDF::loadView('pdf-logbook', [
            'mahasiswa' => $mahasiswa,
            'dospem' => $dospem,
            'catatan' => $catatan
        ]);
        return $pdf->stream();
        return $pdf->download('Lembar Kegiatan Bimbingan Mahasiswa.pdf');
    }
}
