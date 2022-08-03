<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodCategory::insert([
            [
                'name' => 'Sarapan',
            ], [
                'name' => 'Minum Pagi',
            ], [
                'name' => 'Makan Tengahhari',
            ], [
                'name' => 'Minum Petang',
            ], [
                'name' => 'Makan Malam',
            ]
        ]);
    }
}
