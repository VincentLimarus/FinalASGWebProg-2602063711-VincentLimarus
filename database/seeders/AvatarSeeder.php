<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\AvatarModel as Avatar;

class AvatarSeeder extends Seeder
{
   
    public function run(): void
    {
        $faker = Factory::create("id_ID");

        for($i = 1; $i <= 5; $i++) {
            Avatar::create([
                'name' => $faker->name,
                'profile_url' => "assets/avatar{$i}.jpg",
                'price' => random_int(50, 100000)
            ]);
        }
    }
}
