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

        $gifts = config('array_gift');
        foreach ($gifts as $newgift) {
            $newGift = new Gift();
            $newGift->name = $newgift['name'];
            $newGift->surname = $newgift['surname'];
            $newGift->imgGift = $newgift['imgGift'];
            $newGift->nameGift = $newgift['nameGift'];
            $newGift->description = $newgift['description'];
            $newGift->kidGood = $faker->boolean();
            $newGift->save();
        }


    }
}
