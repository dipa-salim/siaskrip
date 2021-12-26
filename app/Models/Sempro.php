<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sempro extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa', 'judul_skripsi', 'dosen_pembimbing1', 'dosen_pembimbing2', 'dosen_penguji1', 'dosen_penguji2', 'url_lembar_dosen', 'url_skripsi', 'url_jadwal', 'id_surat_sebelumnya', 'url_revisi', 'url_surat_skripsi', 'catatan', 'status', 'create_by', 'update_by'
    ];

    protected $primaryKey = 'id_sempro';

    protected $table = 'tb_sempro';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, "id_mahasiswa");
    }

    public function suratSebelumnya()
    {
        return $this->hasOne(Sempro::class, "id_sempro", "id_surat_sebelumnya");
    }

    public function suratRevisi()
    {
        return $this->belongsTo(Sempro::class, "id_surat_sebelumnya", "id_sempro");
    }

    public function dospem1()
    {
        return $this->belongsTo(Dosen::class, "dosen_pembimbing1", "id_dosen");
    }

    public function dospem2()
    {
        return $this->belongsTo(Dosen::class, "dosen_pembimbing2", "id_dosen");
    }

    public function dospeng1()
    {
        return $this->belongsTo(Dosen::class, "dosen_penguji1", "id_dosen");
    }

    public function dospeng2()
    {
        return $this->belongsTo(Dosen::class, "dosen_penguji2", "id_dosen");
    }
}
