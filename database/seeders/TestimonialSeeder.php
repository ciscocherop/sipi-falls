<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'country' => 'United Kingdom',
                'message' => 'Absolutely breathtaking experience! The three waterfalls are magnificent, and our guide Samuel was incredibly knowledgeable about the local culture and history. The abseiling adventure was the highlight of our Uganda trip. Highly recommend!',
                'rating' => 5,
                'visit_date' => '2024-11-15',
                'is_featured' => true,
                'is_active' => true,
                'order' => 1
            ],
            [
                'name' => 'Michael Chen',
                'country' => 'Australia',
                'message' => 'What an incredible adventure! The rock climbing and waterfall hikes exceeded all expectations. The views are spectacular and the guides are professional and friendly. This is a must-visit destination in Uganda.',
                'rating' => 5,
                'visit_date' => '2024-10-28',
                'is_featured' => true,
                'is_active' => true,
                'order' => 2
            ],
            [
                'name' => 'Emma Rodriguez',
                'country' => 'Spain',
                'message' => 'The coffee tour combined with the waterfall visit was perfect! Grace showed us the entire coffee process from bean to cup, and the cultural insights were fascinating. The scenery is absolutely stunning.',
                'rating' => 5,
                'visit_date' => '2024-12-05',
                'is_featured' => true,
                'is_active' => true,
                'order' => 3
            ],
            [
                'name' => 'James Wilson',
                'country' => 'Canada',
                'message' => 'Amazing experience with professional guides. The safety measures for abseiling were excellent, and the views from the top of the falls are unforgettable. Great value for money!',
                'rating' => 4,
                'visit_date' => '2024-09-20',
                'is_featured' => false,
                'is_active' => true,
                'order' => 4
            ],
            [
                'name' => 'Lisa Andersson',
                'country' => 'Sweden',
                'message' => 'Beautiful waterfalls and excellent hiking trails. The local community is very welcoming, and the guides are passionate about their work. A truly authentic Ugandan experience.',
                'rating' => 4,
                'visit_date' => '2024-08-12',
                'is_featured' => false,
                'is_active' => true,
                'order' => 5
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}