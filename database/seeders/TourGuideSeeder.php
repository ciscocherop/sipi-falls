<?php

namespace Database\Seeders;

use App\Models\TourGuide;
use Illuminate\Database\Seeder;

class TourGuideSeeder extends Seeder
{
    public function run(): void
    {
        $tourGuides = [
            [
                'name' => 'Samuel Kato',
                'title' => 'Senior Adventure Guide',
                'bio' => 'With over 8 years of experience guiding visitors through the breathtaking landscapes around Sipi Falls, Samuel is passionate about sharing the natural beauty and cultural heritage of Eastern Uganda. He specializes in waterfall hikes, rock climbing, and cultural tours.',
                'phone' => '+256 700 123 456',
                'email' => 'samuel@sipifalls.com',
                'years_experience' => 8,
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'Grace Namukose',
                'title' => 'Cultural Heritage Guide',
                'bio' => 'Grace brings 5 years of expertise in cultural tourism and community engagement. She offers unique insights into local traditions, coffee farming practices, and the rich history of the Bagisu people. Her warm personality makes every tour memorable.',
                'phone' => '+256 700 234 567',
                'email' => 'grace@sipifalls.com',
                'years_experience' => 5,
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'David Wamukota',
                'title' => 'Adventure Sports Specialist',
                'bio' => 'David is our go-to guide for adrenaline seekers. With 6 years of experience in rock climbing, abseiling, and extreme sports, he ensures safety while delivering unforgettable adventure experiences around the three magnificent waterfalls.',
                'phone' => '+256 700 345 678',
                'email' => 'david@sipifalls.com',
                'years_experience' => 6,
                'is_active' => true,
                'order' => 3
            ]
        ];

        foreach ($tourGuides as $guide) {
            TourGuide::create($guide);
        }
    }
}