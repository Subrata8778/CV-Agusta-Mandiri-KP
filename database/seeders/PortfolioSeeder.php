<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portofolio::create([
            'title' => 'Letter Box Hotel Amaris',
            'photo' => 'porto/letter_box_amaris.jpeg',
            'description' => 'CV Agusta Mandiri dipercaya membuat dan memasang letter box bertuliskan nama hotel untuk Hotel Amaris Denpasar',
            'category' => 'Adv',
        ]);

        Portofolio::create([
            'title' => 'Letter Box Mie Gacoan',
            'photo' => 'porto/letter_box_mie_gacoan.jpeg',
            'description' => 'CV Agusta Mandiri dipercaya membuat dan memasang letter box bertuliskan nama restoran untuk Mie Gacoan Renon, Denpasar',
            'category' => 'Adv',
        ]);

        Portofolio::create([
            'title' => 'KIA Picanto',
            'photo' => 'porto/kia_picanto.jpeg',
            'description' => 'Telah terjual 1 unit KIA Picanto dari Agusta Motor Mengwi',
            'category' => 'Car',
        ]);

        Portofolio::create([
            'title' => 'Honda HRV',
            'photo' => 'porto/honda_hrv.jpeg',
            'description' => 'Telah terjual 1 unit Honda HRV dari Agusta Motor Mengwi',
            'category' => 'Car',
        ]);

        Portofolio::create([
            'title' => 'Rumah Mahendradata',
            'photo' => 'porto/rumah_mahendradata.jpeg',
            'description' => 'Telah terjual 1 unit rumah Jati Mahendradata berlokasi di Denpasar',
            'category' => 'Prop',
        ]);

        Portofolio::create([
            'title' => 'Car Branding J&T Cargo',
            'photo' => 'porto/car_branding_jnt.jpeg',
            'description' => 'CV Agusta Mandiri dipercaya membuat dan memasang car branding bertuliskan nama perusahaan untuk truk pengiriman J&T Cargo Denpasar',
            'category' => 'Adv',
        ]);

        Portofolio::create([
            'title' => 'Neon Box Erafone',
            'photo' => 'porto/neon_box_erafone.jpeg',
            'description' => 'CV Agusta Mandiri dipercaya membuat dan memasang neon box bertuliskan nama perusahaan untuk Erafone Badung',
            'category' => 'Adv',
        ]);
    }
}
