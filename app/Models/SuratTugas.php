<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratTugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa', 'judul_skripsi', 'url_bab1', 'dosen_pembimbing1', 'dosen_pembimbing2', 'url_surat_dosen', 'url_surat_tugas', 'id_surat_sebelumnya', 'status', 'create_by', 'update_by'
    ];

    protected $primaryKey = 'id_surat_tugas';

    protected $table = 'tb_surat_tugas';

    public function dospem1()
    {
        return $this->belongsTo(Dosen::class, "dosen_pembimbing1", "id_dosen");
    }

    public function dospem2()
    {
        return $this->belongsTo(Dosen::class, "dosen_pembimbing2", "id_dosen");
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, "id_mahasiswa");
    }

    public function suratSebelumnya()
    {
        return $this->hasOne(SuratTugas::class, "id_surat_tugas", "id_surat_sebelumnya");
    }

    public function suratPerpanjang()
    {
        return $this->belongsTo(SuratTugas::class, "id_surat_sebelumnya", "id_surat_tugas");
    }
}
