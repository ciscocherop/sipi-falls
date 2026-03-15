<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use Illuminate\Database\Seeder;

class AccommodationSeeder extends Seeder
{
    public function run(): void
    {
        $accommodations = [
            [
                'name'              => 'Sipi Valley Resort',
                'type'              => 'Resort',
                'description'       => 'Stunning views of Sipi Falls with modern amenities and warm Ugandan hospitality.',
                'location'          => 'Sipi, Kapchorwa',
                'image'             => 'images/gallery/falls/waterfall-rainbow.jpg',
                'whatsapp_message'  => "Hi, I'd like to know more about Sipi Valley Resort",
                'is_active'         => true,
            ],
            [
                'name'              => 'Rafiki Lodge',
                'type'              => 'Lodge',
                'description'       => 'A cozy lodge nestled in the hills offering breathtaking valley views and local cuisine.',
                'location'          => 'Sipi, Kapchorwa',
                'image'             => 'images/gallery/mountain/sunset-friends.jpg',
                'whatsapp_message'  => "Hi, I'd like to know more about Rafiki Lodge",
                'is_active'         => true,
            ],
            [
                'name'              => 'Noahs Ark Hotel',
                'type'              => 'Hotel',
                'description'       => 'Comfortable hotel accommodation with easy access to all Sipi Falls activities.',
                'location'          => 'Kapchorwa Town',
                'image'             => 'images/gallery/falls/waterfall-double.jpg',
                'whatsapp_message'  => "Hi, I'd like to know more about Noahs Ark Hotel",
                'is_active'         => true,
            ],
            [
                'name'              => 'Moses Campsite',
                'type'              => 'Campsite',
                'description'       => 'Budget friendly camping experience right at the heart of Sipi Falls with stunning night skies.',
                'location'          => 'Sipi, Kapchorwa',
                'image'             => 'images/gallery/mountain/sunset-toast.jpg',
                'whatsapp_message'  => "Hi, I'd like to know more about Moses Campsite",
                'is_active'         => true,
            ],
        ];

        foreach ($accommodations as $data) {
            Accommodation::firstOrCreate(['name' => $data['name']], $data);
        }
    }
}
