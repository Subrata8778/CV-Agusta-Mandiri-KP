<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdvProductSeeder::class);
        $this->call(CarBrandSeeder::class);
        $this->call(CarCategorySeeder::class);
        $this->call(CarProductSeeder::class);
        $this->call(PropProductSeeder::class);
        $this->call(UserSeeder::class);
        
        $this->call(AdvPhotoSeeder::class);
        $this->call(CarPhotoSeeder::class);
        $this->call(PropPhotoSeeder::class);

        $this->call(PortfolioSeeder::class);
    }
}
