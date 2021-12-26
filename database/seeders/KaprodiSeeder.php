<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KaprodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kaprodi')->insert([
            'id_kaprodi' => 1,
            'id_user' => 2,
            'nama' => 'Dr. Widodo, M.Kom.',
            'nip' => '12345678',
            'jenis_kelamin' => 'L',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
