<?php

namespace Database\Seeders;

use App\Models\CarPhoto;
use Illuminate\Database\Seeder;

class CarPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarPhoto::create([
            'url' => 'car/toyota_innova_2016_1.jpeg',
            'car_product_id' => 1,
        ]);
        
        CarPhoto::create([
            'url' => 'car/toyota_innova_2016_2.jpeg',
            'car_product_id' => 1,
        ]);

        CarPhoto::create([
            'url' => 'car/toyota_innova_2016_3.jpeg',
            'car_product_id' => 1,
        ]);

        CarPhoto::create([
            'url' => 'car/honda_hrv_2019_1.jpeg',
            'car_product_id' => 2,
        ]);

        CarPhoto::create([
            'url' => 'car/honda_hrv_2019_2.jpeg',
            'car_product_id' => 2,
        ]);

        CarPhoto::create([
            'url' => 'car/honda_hrv_2019_3.jpeg',
            'car_product_id' => 2,
        ]);

        CarPhoto::create([
            'url' => 'car/daihatsu_granmax_2021_1.jpeg',
            'car_product_id' => 3,
        ]);

        CarPhoto::create([
            'url' => 'car/daihatsu_granmax_2021_2.jpeg',
            'car_product_id' => 3,
        ]);

        CarPhoto::create([
            'url' => 'car/daihatsu_granmax_2021_3.jpeg',
            'car_product_id' => 3,
        ]);

        CarPhoto::create([
            'url' => 'car/suzuki_x_over_2008_1.jpeg',
            'car_product_id' => 4,
        ]);

        CarPhoto::create([
            'url' => 'car/suzuki_x_over_2008_2.jpeg',
            'car_product_id' => 4,
        ]);

        CarPhoto::create([
            'url' => 'car/suzuki_x_over_2008_3.jpeg',
            'car_product_id' => 4,
        ]);

        CarPhoto::create([
            'url' => 'car/suzuki_x_over_2008_4.jpeg',
            'car_product_id' => 4,
        ]);

        CarPhoto::create([
            'url' => 'car/nissan_navara_2015_1.jpeg',
            'car_product_id' => 5,
        ]);

        CarPhoto::create([
            'url' => 'car/nissan_navara_2015_2.jpeg',
            'car_product_id' => 5,
        ]);

        CarPhoto::create([
            'url' => 'car/nissan_navara_2015_3.jpeg',
            'car_product_id' => 5,
        ]);

        CarPhoto::create([
            'url' => 'car/kia_picanto_2012_1.jpeg',
            'car_product_id' => 6,
        ]);

        CarPhoto::create([
            'url' => 'car/kia_picanto_2012_2.jpeg',
            'car_product_id' => 6,
        ]);

        CarPhoto::create([
            'url' => 'car/kia_picanto_2012_3.jpeg',
            'car_product_id' => 6,
        ]);

        CarPhoto::create([
            'url' => 'car/kia_picanto_2012_4.jpeg',
            'car_product_id' => 6,
        ]);

        CarPhoto::create([
            'url' => 'car/honda_civic_1987_1.jpeg',
            'car_product_id' => 7,
        ]);

        CarPhoto::create([
            'url' => 'car/honda_civic_1987_2.jpeg',
            'car_product_id' => 7,
        ]);

        CarPhoto::create([
            'url' => 'car/honda_civic_1987_3.jpeg',
            'car_product_id' => 7,
        ]);

        CarPhoto::create([
            'url' => 'car/toyota_kijang_1995_1.jpeg',
            'car_product_id' => 8,
        ]);

        CarPhoto::create([
            'url' => 'car/toyota_kijang_1995_2.jpeg',
            'car_product_id' => 8,
        ]);

        CarPhoto::create([
            'url' => 'car/toyota_kijang_1995_3.jpeg',
            'car_product_id' => 8,
        ]);

        CarPhoto::create([
            'url' => 'car/mazda_capella_1989_1.jpeg',
            'car_product_id' => 9,
        ]);

        CarPhoto::create([
            'url' => 'car/mazda_capella_1989_2.jpeg',
            'car_product_id' => 9,
        ]);

        CarPhoto::create([
            'url' => 'car/mazda_capella_1989_3.jpeg',
            'car_product_id' => 9,
        ]);

        CarPhoto::create([
            'url' => 'car/mazda_capella_1989_4.jpeg',
            'car_product_id' => 9,
        ]);
    }
}
