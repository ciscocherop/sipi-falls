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
                'name' => 'Chelimo Risper',
                'title' => 'Senior Adventure Guide',
                'bio' => 'With over 8 years of experience guiding visitors through the breathtaking landscapes around Sipi Falls, Risper is passionate about sharing the natural beauty and cultural heritage of Eastern Uganda. She specializes in waterfall hikes, rock climbing, and cultural tours.',
                'phone' => '+256 700 123 456',
                'email' => 'risper@sipifalls.com',
                'years_experience' => 8,
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'Chelimo Joshua',
                'title' => 'Cultural Heritage Guide',
                'bio' => 'Joshua brings 5 years of expertise in cultural tourism and community engagement. He offers unique insights into local traditions, coffee farming practices, and the rich history of the Sabiny people. His warm personality makes every tour memorable.',
                'phone' => '+256 700 234 567',
                'email' => 'joshua@sipifalls.com',
                'years_experience' => 5,
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'Cherop Sisco',
                'title' => 'Adventure Sports Specialist',
                'bio' => 'Sisco is our go-to guide for adrenaline seekers. With 6 years of experience in rock climbing, abseiling, and extreme sports, he ensures safety while delivering unforgettable adventure experiences around the three magnificent waterfalls.',
                'phone' => '+256 700 345 678',
                'email' => 'sisco@sipifalls.com',
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