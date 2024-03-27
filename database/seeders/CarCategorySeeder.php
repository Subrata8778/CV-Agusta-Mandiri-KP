<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarCategory;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        CarCategory::create([
            'category' => 'SUV',
        ]);

        // 2
        CarCategory::create([
            'category' => 'MPV',
        ]);

        // 3
        CarCategory::create([
            'category' => 'Sedan',
        ]);

        // 4
        CarCategory::create([
            'category' => 'Convertible',
        ]);

        // 5
        CarCategory::create([
            'category' => 'Pickup',
        ]);

        // 6
        CarCategory::create([
            'category' => 'Double Cabin',
        ]);

        // 7
        CarCategory::create([
            'category' => 'Hatchback',
        ]);

        // 8
        CarCategory::create([
            'category' => 'Station Wagon',
        ]);
    }
}
