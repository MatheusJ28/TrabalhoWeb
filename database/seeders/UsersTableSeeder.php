<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'  =>  'user1@email.com',
                'password'  =>  Hash::make('abc123456'),
                'created_at'    => now(),
            ],
            [
                'username'  =>  'user2@email.com',
                'password'  =>  Hash::make('abc123456'),
                'created_at'    => now(), 
            ],
            [
                'username'  =>  'user3@email.com',
                'password'  =>  Hash::make('abc123456'),
                'created_at'    => now(),
            ]
        ]);
    }
}
