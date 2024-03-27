<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Car::create([
            'title' => 'Kijang Innova',
            'year' => '2016',
            'price' => 300000000,
            'kilometre' => 95000,
            'transmission' => 'Automatic',
            'capacity' => '4',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 2,
            'car_category_id' => 2,
        ]);

        // 2
        Car::create([
            'title' => 'HRV Prestige',
            'year' => '2019',
            'price' => 319000000,
            'kilometre' => 20000,
            'transmission' => 'Automatic',
            'capacity' => '3',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 4,
            'car_category_id' => 1,
        ]);

        // 3
        Car::create([
            'title' => 'Granmax',
            'year' => '2021',
            'price' => 120000000,
            'kilometre' => 13000,
            'transmission' => 'Manual',
            'capacity' => '2',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 3,
            'car_category_id' => 5,
        ]);

        // 4
        Car::create([
            'title' => 'X Over',
            'year' => '2008',
            'price' => 94000000,
            'kilometre' => 120000,
            'transmission' => 'Automatic',
            'capacity' => '2',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 6,
            'car_category_id' => 1,
        ]);

        // 5
        Car::create([
            'title' => 'Navara',
            'year' => '2016',
            'price' => 380000000,
            'kilometre' => 70000,
            'transmission' => 'Automatic',
            'capacity' => '4',
            'fuel' => 'Diesel',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 30,
            'car_category_id' => 6,
        ]);

        // 6
        Car::create([
            'title' => 'Picanto',
            'year' => '2012',
            'price' => 80000000,
            'kilometre' => 70000,
            'transmission' => 'Manual',
            'capacity' => '2',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 9,
            'car_category_id' => 7,
        ]);

        // 7
        Car::create([
            'title' => 'Civic Wonder',
            'year' => '1987',
            'price' => 20500000,
            'kilometre' => 200000,
            'transmission' => 'Manual',
            'capacity' => '2',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 4,
            'car_category_id' => 3,
        ]);

        // 8
        Car::create([
            'title' => 'Kijang Rover',
            'year' => '1995',
            'price' => 38000000,
            'kilometre' => 186900,
            'transmission' => 'Manual',
            'capacity' => '3',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 2,
            'car_category_id' => 8,
        ]);

        // 9
        Car::create([
            'title' => 'Capella',
            'year' => '1989',
            'price' => 37000000,
            'kilometre' => 200000,
            'transmission' => 'Manual',
            'capacity' => '3',
            'fuel' => 'Petrol',
            'description' => '',
            'sell_status' => 'Available',
            'car_brand_id' => 10,
            'car_category_id' => 7,
        ]);
    }
}
