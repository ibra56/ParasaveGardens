<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paymentsTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        $paymentMethods = ['cash', 'card', 'mobile_money'];

        for($i = 0; $i < 100; $i++) {
            $day = now()->subDays(rand(0, 20));
            Payment::create([
                'customer_id' => $customers->random()->id,
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'amount' => rand(100, 1000),
                'payment_date' => $day,
                'created_at' => $day,
                'updated_at' => $day
            ]);
        }
    }
}
