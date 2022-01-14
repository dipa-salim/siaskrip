<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_dosen')->insert([
            'id_dosen' => 1,
            'id_user' => 3,
            'nama' => 'Irma Permata Sari, M.Eng.',
            'nip' => '12345678',
            'jenis_kelamin' => 'P',
            'email' => 'buirma@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 2,
            'id_user' => 4,
            'nama' => 'Fuad Mumtas, M.T.I.',
            'nip' => '123456789',
            'jenis_kelamin' => 'L',
            'email' => 'pakfuad@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 3,
            'id_user' => 5,
            'nama' => 'Dr. Yuliatri Sastrawijaya, M.Pd.',
            'nip' => '12345678',
            'jenis_kelamin' => 'p',
            'email' => 'buyuli@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 4,
            'id_user' => 6,
            'nama' => 'Ali Idrus, M.Kom',
            'nip' => '123456789',
            'jenis_kelamin' => 'L',
            'email' => 'pakali@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 5,
            'id_user' => 7,
            'nama' => 'Diat Nurhidayat, M.T.I',
            'nip' => '12345678',
            'jenis_kelamin' => 'L',
            'email' => 'pakdiat@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 6,
            'id_user' => 8,
            'nama' => 'Z.E. Ferdi Fauzian Putra, S.Pd., M.Pd.T.',
            'nip' => '123456789',
            'jenis_kelamin' => 'L',
            'email' => 'pakferdi@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 7,
            'id_user' => 9,
            'nama' => 'Muchammad Ficky Duskarnaen, M.Sc.',
            'nip' => '12345678',
            'jenis_kelamin' => 'L',
            'email' => 'pakfiki@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 8,
            'id_user' => 10,
            'nama' => 'Hamidiilah Ajie, S.T., M.T.',
            'nip' => '123456789',
            'jenis_kelamin' => 'L',
            'email' => 'pakajie@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 9,
            'id_user' => 11,
            'nama' => 'Dr. Ir. Dra. Erdawaty Kamaruddin, M.Pd',
            'nip' => '123456789',
            'jenis_kelamin' => 'P',
            'email' => 'buerda@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 10,
            'id_user' => 12,
            'nama' => 'Murien Nugraheni, S.T., M.Cs.',
            'nip' => '123456789',
            'jenis_kelamin' => 'P',
            'email' => 'bumurien@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 11,
            'id_user' => 13,
            'nama' => 'Bambang Prasetya Adhi, S.Pd., M.Kom.',
            'nip' => '123456789',
            'jenis_kelamin' => 'L',
            'email' => 'pakbambang@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_dosen')->insert([
            'id_dosen' => 12,
            'id_user' => 14,
            'nama' => 'Prasetyo Wibowo Yunanto, S.T., M.Eng.',
            'nip' => '123456789',
            'jenis_kelamin' => 'L',
            'email' => 'pakpras@gmail.com',
            'no_hp' => '0812181818',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
