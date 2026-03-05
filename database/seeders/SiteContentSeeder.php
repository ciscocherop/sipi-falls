<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContent;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Contact Page
            [
                'key' => 'contact_phone',
                'value' => '+256 123 456 789',
                'type' => 'text',
                'page' => 'contact',
                'label' => 'Phone Number'
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@sipifalls.com',
                'type' => 'email',
                'page' => 'contact',
                'label' => 'Email Address'
            ],
            [
                'key' => 'contact_address',
                'value' => 'Sipi Falls, Kapchorwa District, Uganda',
                'type' => 'text',
                'page' => 'contact',
                'label' => 'Physical Address'
            ],
            [
                'key' => 'contact_hours',
                'value' => 'Monday - Sunday: 8:00 AM - 6:00 PM',
                'type' => 'text',
                'page' => 'contact',
                'label' => 'Business Hours'
            ],
            
            // About Page
            [
                'key' => 'about_title',
                'value' => 'About Sipi Falls',
                'type' => 'text',
                'page' => 'about',
                'label' => 'Page Title'
            ],
            [
                'key' => 'about_description',
                'value' => 'Sipi Falls is a series of three stunning waterfalls located in Eastern Uganda on the edge of Mount Elgon National Park. The falls are a breathtaking natural wonder, cascading down from heights of up to 100 meters.',
                'type' => 'textarea',
                'page' => 'about',
                'label' => 'Main Description'
            ],
            
            // Travel Guide Page
            [
                'key' => 'guide_best_time',
                'value' => 'The best time to visit Sipi Falls is during the dry seasons (December to February and June to August) when the trails are less muddy and the weather is more predictable.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Best Time to Visit'
            ],
            [
                'key' => 'guide_what_to_bring',
                'value' => 'Comfortable hiking shoes, rain jacket, sunscreen, insect repellent, camera, water bottle, and light snacks.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'What to Bring'
            ],
            [
                'key' => 'guide_activities',
                'value' => 'Waterfall hiking, rock climbing, abseiling, coffee tours, bird watching, and cultural village visits.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Available Activities'
            ],
            
            // Home Page - Tour Guides Section
            [
                'key' => 'home_guides_title',
                'value' => 'Our Expert Tour Guides',
                'type' => 'text',
                'page' => 'home',
                'label' => 'Tour Guides Section Title'
            ],
            [
                'key' => 'home_guides_description',
                'value' => 'Meet our experienced and friendly tour guides who will make your Sipi Falls adventure unforgettable.',
                'type' => 'textarea',
                'page' => 'home',
                'label' => 'Tour Guides Description'
            ],
            
            // Home Page - Recent Tourists/Testimonials Section
            [
                'key' => 'home_testimonials_title',
                'value' => 'What Our Visitors Say',
                'type' => 'text',
                'page' => 'home',
                'label' => 'Testimonials Section Title'
            ],
            [
                'key' => 'home_testimonials_description',
                'value' => 'Hear from travelers who have experienced the magic of Sipi Falls.',
                'type' => 'textarea',
                'page' => 'home',
                'label' => 'Testimonials Description'
            ],
        ];

        foreach ($contents as $content) {
            SiteContent::updateOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}
