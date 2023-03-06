<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $products = [
            [
                "name" => "HP OfficeJet Pro 9015e All-in-One Printer",
                "spec" => "This printer can print",
                "price" => 500000,
                "stock" => 5,
            ],
            [
                "name" => "Epson L3210",
                "spec" => "This printer can print",
                "price" => 400000,
                "stock" => 3,
            ],
            [
                "name" => "Canon PIXMA",
                "spec" => "This printer can print",
                "price" => 650000,
                "stock" => 6,
            ],
            [
                "name" => "Brother MFC-J4335DW",
                "spec" => "This printer can print",
                "price" => 650000,
                "stock" => 6,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
