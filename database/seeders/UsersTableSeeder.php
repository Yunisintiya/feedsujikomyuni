<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data pengguna
        $users = [
            [
                'name' => 'Yuni',
                'email' => 'yuni@gmail.com',
                'password' => Hash::make('Seventeen6.'),
            ],
            [
                'name' => 'Jeonghan',
                'email' => 'jeonghan@gmail.com.com',
                'password' => Hash::make('Seventeen6.'),
            ],
            // Tambahkan data pengguna lainnya sesuai kebutuhan
        ];

        // Masukkan data pengguna ke dalam database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
