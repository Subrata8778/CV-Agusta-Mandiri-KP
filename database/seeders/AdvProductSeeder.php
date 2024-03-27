<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advertising;

class AdvProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Advertising::create([
            'name' => 'Billboard',
            'category' => 'Outdoor',
        ]);

        // 2
        Advertising::create([
            'name' => 'Neon Box',
            'category' => 'IO',
        ]);

        // 3
        Advertising::create([
            'name' => 'Letter Box',
            'category' => 'IO',
        ]);

        // 4
        Advertising::create([
            'name' => 'Aluminium Composite',
            'category' => 'Indoor',
        ]);

        // 5
        Advertising::create([
            'name' => 'Car Branding',
            'category' => 'Outdoor',
        ]);

        // 6
        Advertising::create([
            'name' => 'Kartu Nama',
            'category' => 'Outdoor',
        ]);

        // 7
        Advertising::create([
            'name' => 'X Banner / Roll Up Banner',
            'category' => 'IO',
        ]);

        // 8
        Advertising::create([
            'name' => 'Flyer',
            'category' => 'Outdoor',
        ]);

        // 9
        Advertising::create([
            'name' => 'Umbul-umbul',
            'category' => 'Outdoor',
        ]);

        // 10
        Advertising::create([
            'name' => 'Stiker Kaca',
            'category' => 'Indoor',
        ]);

        // 11
        Advertising::create([
            'name' => 'Wall Branding',
            'category' => 'Indoor',
        ]);

        // 12
        Advertising::create([
            'name' => 'Partisi Kaca',
            'category' => 'Indoor',
        ]);

        // 13
        Advertising::create([
            'name' => 'Partisi Gypsum',
            'category' => 'Indoor',
        ]);

        // 14
        Advertising::create([
            'name' => 'Booth Partisi',
            'category' => 'Indoor',
        ]);

        // 15
        Advertising::create([
            'name' => 'Rak Display',
            'category' => 'Indoor',
        ]);

        // 16
        Advertising::create([
            'name' => 'Spanduk',
            'category' => 'Outdoor',
        ]);

        // 17
        Advertising::create([
            'name' => 'Interior Meja',
            'category' => 'Indoor',
        ]);

        // 18
        Advertising::create([
            'name' => 'Akrilik Display',
            'category' => 'Indoor',
        ]);

        // 19
        Advertising::create([
            'name' => 'Seragam',
            'category' => 'IO',
        ]);
    }
}
