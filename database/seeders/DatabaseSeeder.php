<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            userMgtPermissions::class,
            DashboardTableSeeder::class,

            ExpenseCategorySeeders::class,
            ExpenseItemsSeeder::class,
            CurrencySeeder::class,
        ]);
    }
}
