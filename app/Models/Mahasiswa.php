<?php

namespace App\Models;

use App\Models\SuratTugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user','nama', 'nim', 'jenis_kelamin', 'no_hp', 'angkatan'
    ];

    protected $primaryKey = 'id_mahasiswa';

    protected $table = 'tb_mahasiswa';

    public function mhsBimbingan()
    {
        return $this->hasMany(MhsBimbingan::class, 'id_mahasiswa');
    }

    public function suratTugas()
    {

        return $this->hasMany(SuratTugas::class, 'id_mahasiswa');
    }

    public function logbook()
    {

        return $this->hasMany(SuratTugas::class, 'id_mahasiswa');
    }

    public function sempro()
    {

        return $this->hasMany(Sempro::class, 'id_mahasiswa');
    }

    public function skripsi()
    {

        return $this->hasMany(Sempro::class, 'id_mahasiswa');
    }
}
