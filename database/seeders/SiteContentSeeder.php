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
                'value' => '+256 703558174',
                'type' => 'text',
                'page' => 'contact',
                'label' => 'Phone Number'
            ],
            [
                'key' => 'contact_email',
                'value' => 'ciscocherry6@gmail.com',
                'type' => 'email',
                'page' => 'contact',
                'label' => 'Email Address'
            ],
            [
                'key' => 'contact_address',
                'value' => 'Kapchorwa, Uganda',
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
            
            // Travel Guide Page - Essential Tips
            [
                'key' => 'travelguide_when_to_visit',
                'value' => 'The best time to visit Sipi Falls is during the dry seasons — January to March and August to September. You\'ll enjoy clear views and safer trails!',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'When to Visit'
            ],
            [
                'key' => 'travelguide_what_to_wear',
                'value' => 'Pack sturdy hiking shoes with good grip — Sipi\'s trails can be slippery! Don\'t forget a rain jacket for sudden showers.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'What to Wear'
            ],
            [
                'key' => 'travelguide_what_to_pack',
                'value' => 'Bring a reusable water bottle, sunscreen, insect repellent, and a small backpack for your hikes. A camera is a must for the views!',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'What to Pack'
            ],
            [
                'key' => 'travelguide_getting_there',
                'value' => 'Sipi Falls is a 4.5-hour drive from Kampala. Hire a 4WD vehicle for the rugged roads, or book a local tour guide from Mbale.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Getting There'
            ],
            [
                'key' => 'travelguide_where_to_stay',
                'value' => 'Choose from budget guesthouses or scenic lodges like Sipi River Lodge and top-class resorts. Book early during peak season for the best views!',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Where to Stay'
            ],
            [
                'key' => 'travelguide_stay_safe',
                'value' => 'Stick to marked trails, avoid hiking alone, and stay hydrated! The falls can be slippery — watch your step!',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Stay Safe'
            ],
            
            // Travel Guide Page - Activities
            [
                'key' => 'travelguide_activity_1_title',
                'value' => 'Hiking the Waterfalls',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 1 Title'
            ],
            [
                'key' => 'travelguide_activity_1_description',
                'value' => 'Explore scenic trails to all three waterfalls, with breathtaking views and lush landscapes. The beauty about hiking here is that you can choose your own pace and enjoy the serene environment.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Activity 1 Description'
            ],
            [
                'key' => 'travelguide_activity_1_image',
                'value' => 'images/naturewalk.jpg',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 1 Image'
            ],
            [
                'key' => 'travelguide_activity_2_title',
                'value' => 'Abseiling',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 2 Title'
            ],
            [
                'key' => 'travelguide_activity_2_description',
                'value' => 'Descend a 100m cliff beside the main waterfall for an adrenaline rush with professional guides. Experience the thrill of abseiling while enjoying stunning views of the falls and surrounding landscape.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Activity 2 Description'
            ],
            [
                'key' => 'travelguide_activity_2_image',
                'value' => 'images/abseil3.jpg',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 2 Image'
            ],
            [
                'key' => 'travelguide_activity_3_title',
                'value' => 'Coffee Tours',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 3 Title'
            ],
            [
                'key' => 'travelguide_activity_3_description',
                'value' => 'Visit local farms, learn about coffee growing, and taste freshly brewed Sipi coffee. Discover the rich coffee culture of the region and enjoy a unique experience with local farmers.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Activity 3 Description'
            ],
            [
                'key' => 'travelguide_activity_3_image',
                'value' => 'images/cofi.jpg',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 3 Image'
            ],
            [
                'key' => 'travelguide_activity_4_title',
                'value' => 'Bird Watching',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 4 Title'
            ],
            [
                'key' => 'travelguide_activity_4_description',
                'value' => 'Discover over 300 bird species in the Mount Elgon region. Bring your binoculars and enjoy guided bird watching tours through diverse habitats.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Activity 4 Description'
            ],
            [
                'key' => 'travelguide_activity_4_image',
                'value' => 'images/chamelon.jpg',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 4 Image'
            ],
            [
                'key' => 'travelguide_activity_5_title',
                'value' => 'Cave Adventures',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 5 Title'
            ],
            [
                'key' => 'travelguide_activity_5_description',
                'value' => 'The ancient caves echo stories of the past — a thrilling blend of mystery, history, and raw natural beauty. With guided tours, you\'ll discover underground streams and breathtaking views from the rock itself.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Activity 5 Description'
            ],
            [
                'key' => 'travelguide_activity_5_image',
                'value' => 'images/clif2.jpg',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 5 Image'
            ],
            [
                'key' => 'travelguide_activity_6_title',
                'value' => 'Rock Climbing',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 6 Title'
            ],
            [
                'key' => 'travelguide_activity_6_description',
                'value' => 'Challenge yourself on rugged cliffs with guided rock climbing adventures, offering panoramic views from the top.',
                'type' => 'textarea',
                'page' => 'travelguide',
                'label' => 'Activity 6 Description'
            ],
            [
                'key' => 'travelguide_activity_6_image',
                'value' => 'images/rock climbing.jpg',
                'type' => 'text',
                'page' => 'travelguide',
                'label' => 'Activity 6 Image'
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
