<?php

use App\Outlet;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(0,9) as $i){
            Outlet::create([
                'name' => $faker->catchPhrase,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
