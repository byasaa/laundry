<?php

use App\Customer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['L','P']);

        foreach(range(0,9) as $i){
            Customer::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'gender' => $gender,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
