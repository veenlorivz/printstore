<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                "user_id" => 2,
                "product_id" => 1,
                "quantity" => 1,
                "total" => 500000,
            ],
            [
                "user_id" => 3,
                "product_id" => 3,
                "quantity" => 2,
                "total" => 650000 * 2,
            ],
            [
                "user_id" => 2,
                "product_id" => 2,
                "quantity" => 1,
                "total" => 400000,
            ],
        ];

        foreach ($orders as $order ) {
            Order::create($order);
        }
    }
}
