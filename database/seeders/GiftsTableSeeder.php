<?php

namespace Database\Seeders;

use App\Models\Gift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class GiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newGift = new Gift();
            $newGift->name = $faker->name();
            $newGift->surname = $faker->lastName();
            $newGift->imgGift = $faker->imageUrl(640, 480, 'animals', true);
            $newGift->nameGift = $faker->name();
            $newGift->kidGood = $faker->boolean();
            $newGift->save();
        }



    }
}
