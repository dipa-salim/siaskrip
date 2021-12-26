<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user', 'nama', 'nip', 'jenis_kelamin', 'no_hp'
    ];

    protected $primaryKey = 'id_kaprodi';

    protected $table = 'tb_kaprodi';
}
