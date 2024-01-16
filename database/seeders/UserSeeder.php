<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'ali',
            'account_id'=> '1000',
            'family' => 'sharifi',
            'email' => 'a@a',
            'password' => 'password',
            'user_type' => 'admin',
            'mobile' => '09139999999',
            'user_status' => 'Active',
        ]);
    }
}
