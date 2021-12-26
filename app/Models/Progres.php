<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa', 'alur', 'status'
    ];

    protected $primaryKey = 'id_progres';

    protected $table = 'tb_progres';
}
