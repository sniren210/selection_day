<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(array(
            [
                'name' => 'user123',
                'email' => 'user@gmail.com',
                'fakultas' => 'ekonomi',
                'jurusan' => 'MBTI',
                'user_verified_at' => null,
                'password' => app('hash')->make('user123'),
                'level' => 0

            ],
            [
                'name' => 'admin123',
                'email' => 'admin@gmail.com',
                'fakultas' => 'ekonomi',
                'jurusan' => 'MBTI',
                'user_verified_at' => null,
                'password' => app('hash')->make('admin123'),
                'level' => 1
            ],
        ));
    }
}
