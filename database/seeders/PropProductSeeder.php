<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Property::Create([
            'category' => 'House',
            'type' => 'Sell',
            'title' => 'Rumah siap huni Sanggulan, Tabanan',
            'price' => 385000000,
            'land_area' => 134,
            'bedroom' => 2,
            'bathroom' => 1,
            'story' => 1,
            'village_id' => 5102040015,
            'address' => 'Perum Multi Bintang Asri ,Blok A no.4',
            'maps' => 'https://maps.app.goo.gl/w32PgqE47kF2fdbj9',
            'certification' => 'SHM',
            'description' => trim('Rumah siap huni
            Lokasi : Perum Multi Bintang Asri ,Blok A no.4, sanggulan Kediri Tabanan
            Jual : -Rp 385.000.000
            Luas tanah : 134 m²
            Fasilitas:
            2 Kamar tidur 
            1 Kamar mandi 
            Garasi
            Dapur
            Ruang tamu
            Teras
            Gudang
            Akses : 150m ± dari Jalan Raya
            Keterangan :
            Renovasi full'),
        ]);

        // 2
        Property::Create([
            'category' => 'House',
            'type' => 'Sell',
            'title' => 'Omah Jati Mahendradata',
            'price' => 2200000000,
            'land_area' => 200,
            'bedroom' => 1,
            'story' => 1,
            'village_id' => 5171030010,
            'address' => 'Padang Mekar street II no. 24 (100 meters from the mahendradata highway)',
            'maps' => 'https://maps.app.goo.gl/BUAzcdyGmqPzhVRcA',
            'certification' => 'SHM',
            'description' => trim('Omah Jati Mahendradata
            Location : Padang Mekar street II no. 24, Padangsambian,Denpasar.
            (100 meters from the mahendradata highway)
            Price : Rp 2.2 billion (Rp 2.200.000.000)
            Size : 200 square meters
            Facility : 
            1 bedroom
            Garage
            Living room
            Garden
            Fully furnished
            AC TV Water heather
            Kitchen
            (SHM)'),
        ]);

        // 3
        Property::Create([
            'category' => 'Land',
            'type' => 'Both',
            'title' => 'Tanah Nusa Dua',
            'price' => 5500000000,
            'land_area' => 300,
            'village_id' => 5103010004,
            'address' => 'Jl. Bypass Ngurah Rai Nusa Dua (Dekat pintu masuk BTDC)',
            'maps' => 'https://maps.app.goo.gl/XQNFRtftYFY4Lqje9',
            'certification' => 'SHM',
            'description' => trim('Tanah Nusa Dua
            Lokasi : Jl. Bypass Ngurah Rai Nusa Dua
            (Dekat pintu masuk BTDC)
            Harga : 
            -Rp 5,5 Milyar (jual)
            -Rp 200jt/tahun (sewa)
            *Minimal Sewa 5 Tahun
            Ukuran : 3 Are
            Lebar depan 14 Meter
            Sudah berisikan dinding belakang.'),
        ]);
    }
}
