<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa', 'tanggal', 'materi', 'status'
    ];

    protected $primaryKey = 'id_logbook';

    protected $table = 'tb_logbook';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, "id_mahasiswa");
    }
}
