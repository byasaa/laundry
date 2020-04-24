<?php

use App\Product;
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

        Product::create([
            'name' => 'Paket Hemat Kiloan',
            'outlet_id' => 6,
            'type' => 'kiloan',
            'price' => 10000,
        ]);
        Product::create([
            'name' => 'Paket Hemat kaos',
            'outlet_id' => 6,
            'type' => 'kaos',
            'price' => 10000,
        ]);
        Product::create([
            'name' => 'Paket Hemat Bed Cover',
            'outlet_id' => 6,
            'type' => 'bed_cover',
            'price' => 10000,
        ]);
        Product::create([
            'name' => 'Paket Hemat Selimut',
            'outlet_id' => 6,
            'type' => 'selimut',
            'price' => 10000,
        ]);

    }
}
