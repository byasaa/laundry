<?php

use App\User;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                'name' => 'Administrator',
                'outlet_id' => 1,
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin'),
                'role' => 'admin'
        ]);
        User::create([
                'name' => 'Kasir',
                'outlet_id' => 1,
                'email' => 'kasir@mail.com',
                'password' => bcrypt('kasir'),
                'role' => 'kasir'
        ]);
        User::create([
                'name' => 'Owner',
                'outlet_id' => 1,
                'email' => 'owner@mail.com',
                'password' => bcrypt('owner'),
                'role' => 'owner'
        ]);
    }
}
