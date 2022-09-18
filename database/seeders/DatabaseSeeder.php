<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 45; $i++) {
            $password = Hash::make(Str::random(40));
            User::create([
                    'email' => $faker->unique()->freeEmail,
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'city' => $faker->city,
                    'birthday' => $faker->date('Y-m-d', '2005-01-01'),
                    'userAgent' => $faker->userAgent,
                    'email_verified_at' => now(),
                    'password' => $password,
                    'remember_token' => Str::random(10),
                ]);         
        }
        session()->flash('status', 'Seeding done');
        return redirect()->back();
    }
}
