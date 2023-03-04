<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values =
            fn ($name, $default_quantity, $default_unit, $calories, $protein, $fat, $carbs, $salt) => [
                'name' => $name, 'default_quantity' => $default_quantity, 'default_unit' => $default_unit, 'calories' => $calories, 'protein' => $protein, 'fat' => $fat, 'carbs' => $carbs, 'salt' => $salt
            ];

        $id = DB::table('foods')->insertGetId($values('ご飯', 100, 'g', 73, 7.0, 4.9, 1.5, 0));

        $id = DB::table('foods')->insertGetId($values('オートミール', 100, 'g', 350, 13.7, 5.7, 69.1, 0));

        $id = DB::table('foods')->insertGetId($values('木綿豆腐', 1, '丁', 73, 7.0, 4.9, 1.5, 0));
        DB::table('food_units')->insert(['food_id' => $id, 'unit' => '丁', 'grams' => 300]);

        $id = DB::table('foods')->insertGetId($values('りんご', 1, '個', 53, 0.1, 0.2, 15.5, 0));
        DB::table('food_units')->insert(['food_id' => $id, 'unit' => '個', 'grams' => 300]);

        $id = DB::table('foods')->insertGetId($values('バナナ', 1, '本', 93, 1.1, 0.2, 22.5, 0));
        DB::table('food_units')->insert(['food_id' => $id, 'unit' => '本', 'grams' => 140]);

        $id = DB::table('foods')->insertGetId($values('アーモンド', 100, 'g', 609, 19.6, 51.8, 20.9, 0));

        $id = DB::table('foods')->insertGetId($values('オリーブオイル', 5, 'ml', 894, 0, 100, 0, 0));
        DB::table('food_units')->insert(['food_id' => $id, 'unit' => 'ml', 'grams' => 0.91]);
    }
}
