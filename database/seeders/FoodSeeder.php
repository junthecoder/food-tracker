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
        $values = fn ($name, $calories, $protein, $fat, $carbs, $salt) =>
            ['name' => $name, 'calories' => $calories, 'protein' => $protein, 'fat' => $fat, 'carbs' => $carbs, 'salt' => $salt];

        DB::table('foods')->insert([
            $values('ご飯', 73, 7.0, 4.9, 1.5, 0),
            $values('オートミール', 350, 13.7, 5.7, 69.1, 0),
            $values('木綿豆腐', 73, 7.0, 4.9, 1.5, 0),
            $values('りんご', 53, 0.1, 0.2, 15.5, 0),
            $values('バナナ', 93, 1.1, 0.2, 22.5, 0),
            $values('オリーブオイル', 894, 0, 100, 0, 0),
            $values('アーモンド', 609, 19.6, 51.8, 20.9, 0),
        ]);
    }
}
