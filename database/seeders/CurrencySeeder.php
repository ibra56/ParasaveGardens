<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            ['name' => 'US Dollar', 'code' => 'USD', 'exchange_rate' => 1.0000],
            ['name' => 'Euro', 'code' => 'EUR', 'exchange_rate' => 0.8500],
            ['name' => 'British Pound', 'code' => 'GBP', 'exchange_rate' => 0.7500],
            ['name' => 'Japanese Yen', 'code' => 'JPY', 'exchange_rate' => 110.0000],
            // Add more currencies as needed
        ]);
    }
}
