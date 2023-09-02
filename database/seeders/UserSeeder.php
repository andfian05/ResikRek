<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'nama' => 'Superadmin Resik Rek',
            'username' => 'supera_rek',
            'email' => 'supera.rek@gmail.com',
            'password' => Hash::make('Superad52@admin'),
            'tmp_lahir' => 'Jombang',
            'tgl_lahir' => date('Y-m-d'),
            'gender' => '',
            'jabatan' => 'Admin',
            'role' => 'Superadmin',
            'foto' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'nama' => 'Admin Resik Rek',
            'username' => 'admin_rek',
            'email' => 'admin.rek@gmail.com',
            'password' => Hash::make('Adminn13@admin'),
            'tmp_lahir' => 'Jombang',
            'tgl_lahir' => date('Y-m-d'),
            'gender' => '',
            'jabatan' => 'Admin',
            'role' => 'Admin',
            'foto' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
