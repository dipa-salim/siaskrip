<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_mahasiswa')->insert([
            'id_mahasiswa' => 1,
            'id_user' => 15,
            'nama' => 'Dipa Noor Salim',
            'nim' => '5235165132',
            'jenis_kelamin' => 'L',
            'no_hp' => '08181818',
            'angkatan' => '2016',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
