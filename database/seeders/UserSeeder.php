<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\WorkModel;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create("id_ID");

        for ($i = 1; $i <= 10; $i++) {
            $price = random_int(100000,125000);
            $coins = random_int(100, 10000);
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'linkedin' => 'https://www.linkedin.com/in/vincent-oliver-limarus-9a3153265',
                'mobile_number' => $faker->phoneNumber,
                'registration_price' => $price,
                'coins' => $coins,
                'profession' => $faker->jobTitle,
                'password' => Hash::make('12345678'),
                'profile_picture' => "assets/person{$i}.jpg",
            ]);

            for ($j = 0; $j < 3; $j++) {
                WorkModel::create([
                    'name' => $faker->jobTitle,
                    'user_id' => $user->id,
                ]);
            }            
        }
    }
}
