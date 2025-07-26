<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'مدير عام',
                'email' => 'admin@sally-shop.test',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'مدير محتوى',
                'email' => 'manager@sally-shop.test',
                'password' => Hash::make('manager123'),
                'role' => 'manager',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'مستخدم عادي',
                'email' => 'user@sally-shop.test',
                'password' => Hash::make('user123'),
                'role' => 'user',
                'remember_token' => Str::random(10),
            ],
        ]);
    }
}
