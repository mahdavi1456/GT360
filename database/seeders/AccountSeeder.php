<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([

            'id' => '1000',
            'account_type' => 'حقیقی',
            'name' => 'gratech',
            'family' => 'gratechy',
            'mobile' => '09130000000'

        ]);

    }
}
