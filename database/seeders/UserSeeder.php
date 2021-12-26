<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_users')->insert([
            'id_user' => 1,
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 2,
            'nama' => 'Dr. Widodo, M.Kom.',
            'email' => 'widodounj@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Kaprodi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 3,
            'nama' => 'Irma Permata Sari, M.Eng.',
            'email' => 'buirma@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 4,
            'nama' => 'Fuad Mumtas, M.T.I.',
            'email' => 'pakfuad@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 5,
            'nama' => 'Dr. Yuliatri Sastrawijaya, M.Pd.',
            'email' => 'buyuli@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 6,
            'nama' => 'Ali Idrus, M.Kom',
            'email' => 'pakali@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 7,
            'nama' => 'Diat Nurhidayat, M.T.I',
            'email' => 'pakdiat@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 8,
            'nama' => 'Z.E. Ferdi Fauzian Putra, S.Pd., M.Pd.T.',
            'email' => 'pakferdi@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 9,
            'nama' => 'Muchammad Ficky Duskarnaen, M.Sc.',
            'email' => 'pakfiki@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 10,
            'nama' => 'Hamidiilah Ajie, S.T., M.T.',
            'email' => 'pakajie@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 11,
            'nama' => 'Dr. Ir. Dra. Erdawaty Kamaruddin, M.Pd',
            'email' => 'buerda@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 12,
            'nama' => 'Murien Nugraheni, S.T., M.Cs.',
            'email' => 'bumurien@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 13,
            'nama' => 'Bambang Prasetya Adhi, S.Pd., M.Kom.',
            'email' => 'pakbambang@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 14,
            'nama' => 'Prasetyo Wibowo Yunanto, S.T., M.Eng.',
            'email' => 'pakpras@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Dosen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('tb_users')->insert([
            'id_user' => 15,
            'nama' => 'Dipa Noor Salim',
            'email' => 'dipa@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Mahasiswa',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
