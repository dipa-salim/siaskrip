<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'nama', 'nip', 'jenis_kelamin', 'no_hp', 'status_dosen'
    ];

    protected $primaryKey = 'id_dosen';

    protected $table = 'tb_dosen';

    public function mhsBimbingan()
    {
        return $this->hasMany(MhsBimbingan::class, 'id_dosen');
    }
}
