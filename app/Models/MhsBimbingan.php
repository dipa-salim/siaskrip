<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MhsBimbingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dosen',
        'id_mahasiswa',
        'id_judul_sebelumnya',
        'id_surat_tugas',
        'id_sempro',
        'id_skripsi',
        'status',
        'status_surat_tugas',
        'status_sempro',
        'status_surat_skripsi',
        'status_skripsi',
        'status_hasil_skripsi',
        'url_bab1',
        'judul_skripsi',
        'url_surat_dosen',
        'url_surat_dosen_ttd',
        'url_lembar_sempro',
        'url_logbook_sempro',
        'url_proposal',
        'url_lembar_sempro_ttd',
        'url_logbook_sempro_ttd',
        'url_lembar_skripsi',
        'url_logbook_skripsi',
        'url_skripsi',
        'url_lembar_skripsi_ttd',
        'url_logbook_skripsi_ttd'
    ];

    protected $primaryKey = 'id_mhs_bimbingan';

    protected $table = 'tb_mhs_bimbingan';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, "id_mahasiswa");
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, "id_dosen");
    }

    public function judulSebelumnya()
    {
        return $this->hasOne(MhsBimbingan::class, "id_mhs_bimbingan", "id_judul_sebelumnya");
    }

    public function judulPerpanjang()
    {
        return $this->belongsTo(SuratTugas::class, "id_judul_sebelumnya", "id_mhs_bimbingan");
    }
}
