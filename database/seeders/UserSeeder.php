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
                'jurusan' => 'MBTI',
                'user_verified_at' => date('Y-m-d h:i:s'),
                'password' => app('hash')->make('user123'),
                'level' => 0,
            ],
            [
                'name' => 'admin123',
                'email' => 'admin@gmail.com',
                'jurusan' => 'MBTI',
                'user_verified_at' => date('Y-m-d h:i:s'),
                'password' => app('hash')->make('admin123'),
                'level' => 2
            ],
            [
                'name' => 'saksi123',
                'email' => 'saksi@gmail.com',
                'jurusan' => 'MBTI',
                'user_verified_at' => date('Y-m-d h:i:s'),
                'password' => app('hash')->make('saksi123'),
                'level' => 1
            ],
            [
                'name' => 'super123',
                'email' => 'super@gmail.com',
                'jurusan' => 'MBTI',
                'user_verified_at' => date('Y-m-d h:i:s'),
                'password' => app('hash')->make('super123'),
                'level' => 3
            ],
        ));
    }
}
