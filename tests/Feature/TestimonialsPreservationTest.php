<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\TourGuide;
use App\Models\Testimonial;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Preservation Property Tests for Testimonials Display Bugfix
 * 
 * **Validates: Requirements 3.1, 3.2, 3.3, 3.4**
 * 
 * These tests verify that fixing the empty Testimonials.jsx component does NOT break
 * any other admin pages or features. They should PASS on both unfixed and fixed code,
 * confirming that the fix preserves all existing functionality.
 * 
 * CRITICAL: These tests MUST PASS on unfixed code (before the fix is applied).
 * This establishes the baseline behavior that must be preserved.
 */
class TestimonialsPreservationTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create an admin user for testing
        $this->adminUser = User::factory()->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }

    /**
     * Property 2: Preservation - Tour Guides Page Displays Correctly
     * 
     * Test that navigation to /admin/content/tourguides displays correctly
     * and is unaffected by the testimonials fix.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.1**
     * 
     * @return void
     */
    public function test_tour_guides_page_displays_correctly(): void
    {
        // Create test tour guides manually
        TourGuide::create([
            'name' => 'John Doe',
            'title' => 'Senior Guide',
            'bio' => 'Experienced guide with 10 years of expertise',
            'years_experience' => 10,
            'is_active' => true,
            'order' => 1,
        ]);
        
        TourGuide::create([
            'name' => 'Jane Smith',
            'title' => 'Adventure Specialist',
            'bio' => 'Passionate about outdoor adventures',
            'years_experience' => 5,
            'is_active' => true,
            'order' => 2,
        ]);
        
        TourGuide::create([
            'name' => 'Bob Wilson',
            'title' => 'Nature Expert',
            'bio' => 'Expert in local flora and fauna',
            'years_experience' => 8,
            'is_active' => true,
            'order' => 3,
        ]);
        
        // Navigate to tour guides page as admin
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/content/tourguides/edit');
        
        // Verify the page loads successfully
        $response->assertStatus(200);
        
        // Verify Inertia component is rendered
        $response->assertInertia(fn ($page) => $page
            ->component('Admin/Content/TourGuides')
            ->has('tourGuides', 3)
            ->where('pageName', 'Tour Guides')
            ->where('page', 'tourguides')
        );
        
        // Verify tour guides data is passed correctly
        $response->assertInertia(fn ($page) => $page
            ->has('tourGuides.0', fn ($guide) => $guide
                ->has('id')
                ->has('name')
                ->has('title')
                ->has('bio')
                ->etc()
            )
        );
    }

    /**
     * Property 2: Preservation - Bookings Page Displays Correctly
     * 
     * Test that navigation to /admin/bookings displays correctly
     * and is unaffected by the testimonials fix.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.3**
     * 
     * @return void
     */
    public function test_bookings_page_displays_correctly(): void
    {
        // Create test bookings manually
        for ($i = 1; $i <= 5; $i++) {
            Booking::create([
                'fullname' => "Guest $i",
                'email' => "guest$i@example.com",
                'date_of_travel' => now()->addDays($i),
                'num_adults' => 2,
                'num_children' => 1,
                'preferred_activities' => 'Hiking, Abseiling',
                'budget' => '500-1000',
                'status' => 'pending',
            ]);
        }
        
        // Navigate to bookings page as admin
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/bookings');
        
        // Verify the page loads successfully
        $response->assertStatus(200);
        
        // Verify Inertia component is rendered
        $response->assertInertia(fn ($page) => $page
            ->component('Admin/Bookings/Index')
            ->has('bookings')
        );
    }

    /**
     * Property 2: Preservation - Contact Messages Page Displays Correctly
     * 
     * Test that navigation to /admin/contact-messages displays correctly
     * and is unaffected by the testimonials fix.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.3**
     * 
     * @return void
     */
    public function test_contact_messages_page_displays_correctly(): void
    {
        // Create test contact messages manually
        for ($i = 1; $i <= 4; $i++) {
            ContactMessage::create([
                'first_name' => "First$i",
                'last_name' => "Last$i",
                'email' => "contact$i@example.com",
                'subject' => "Test Subject $i",
                'message' => "This is a test message $i",
                'is_read' => false,
            ]);
        }
        
        // Navigate to contact messages page as admin
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/contact-messages');
        
        // Verify the page loads successfully
        $response->assertStatus(200);
        
        // Verify Inertia component is rendered
        $response->assertInertia(fn ($page) => $page
            ->component('Admin/ContactMessages/Index')
            ->has('messages')
        );
    }

    /**
     * Property 2: Preservation - Newsletter Subscribers Page Displays Correctly
     * 
     * Test that navigation to /admin/newsletter-subscribers displays correctly
     * and is unaffected by the testimonials fix.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.3**
     * 
     * @return void
     */
    public function test_newsletter_subscribers_page_displays_correctly(): void
    {
        // Create test newsletter subscribers manually
        for ($i = 1; $i <= 6; $i++) {
            NewsletterSubscriber::create([
                'email' => "subscriber$i@example.com",
                'status' => 'active',
            ]);
        }
        
        // Navigate to newsletter subscribers page as admin
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/newsletter-subscribers');
        
        // Verify the page loads successfully
        $response->assertStatus(200);
        
        // Verify Inertia component is rendered
        $response->assertInertia(fn ($page) => $page
            ->component('Admin/NewsletterSubscribers/Index')
            ->has('subscribers')
        );
    }

    /**
     * Property 2: Preservation - Backend ContentController Fetches Testimonials Correctly
     * 
     * Test that ContentController::edit('testimonials') still fetches data
     * using Testimonial::ordered()->get() and passes correct props to Inertia.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.2**
     * 
     * @return void
     */
    public function test_backend_fetches_testimonials_data_correctly(): void
    {
        // Create test testimonials with specific order
        Testimonial::create([
            'name' => 'First',
            'country' => 'USA',
            'message' => 'Great experience!',
            'rating' => 5,
            'is_active' => true,
            'order' => 1,
        ]);
        
        Testimonial::create([
            'name' => 'Second',
            'country' => 'UK',
            'message' => 'Amazing place!',
            'rating' => 5,
            'is_active' => true,
            'order' => 2,
        ]);
        
        Testimonial::create([
            'name' => 'Third',
            'country' => 'Canada',
            'message' => 'Wonderful trip!',
            'rating' => 4,
            'is_active' => true,
            'order' => 3,
        ]);
        
        // Navigate to testimonials page as admin
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/content/testimonials/edit');
        
        // Verify the page loads (even though component is empty on unfixed code)
        $response->assertStatus(200);
        
        // Verify Inertia component is targeted
        $response->assertInertia(fn ($page) => $page
            ->component('Admin/Content/Testimonials')
        );
        
        // Verify backend passes correct props
        $response->assertInertia(fn ($page) => $page
            ->where('page', 'testimonials')
            ->where('pageName', 'Testimonials')
            ->has('testimonials', 3)
        );
        
        // Verify testimonials are ordered correctly
        $response->assertInertia(fn ($page) => $page
            ->where('testimonials.0.name', 'First')
            ->where('testimonials.1.name', 'Second')
            ->where('testimonials.2.name', 'Third')
        );
        
        // Verify testimonials have expected structure
        $response->assertInertia(fn ($page) => $page
            ->has('testimonials.0', fn ($testimonial) => $testimonial
                ->has('id')
                ->has('name')
                ->has('country')
                ->has('message')
                ->has('rating')
                ->has('is_active')
                ->has('order')
                ->etc()
            )
        );
    }

    /**
     * Property 2: Preservation - Public Homepage Testimonials Display Unchanged
     * 
     * Test that testimonials display on the public-facing homepage remains
     * unaffected by the admin dashboard fix.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.4**
     * 
     * @return void
     */
    public function test_public_homepage_testimonials_display_unchanged(): void
    {
        // Create active testimonials for homepage
        for ($i = 1; $i <= 5; $i++) {
            Testimonial::create([
                'name' => "Active Guest $i",
                'country' => "Country $i",
                'message' => "This is an active testimonial $i",
                'rating' => 5,
                'is_active' => true,
                'order' => $i,
            ]);
        }
        
        // Create inactive testimonials (should not appear)
        for ($i = 1; $i <= 2; $i++) {
            Testimonial::create([
                'name' => "Inactive Guest $i",
                'country' => "Country X",
                'message' => "This is an inactive testimonial $i",
                'rating' => 5,
                'is_active' => false,
                'order' => 100 + $i,
            ]);
        }
        
        // Navigate to public homepage
        $response = $this->get('/');
        
        // Verify the page loads successfully
        $response->assertStatus(200);
        
        // Verify testimonials section exists
        $response->assertSee('Hear From Our Adventurers');
        
        // Verify active testimonials are displayed (limited to 3 on homepage)
        $displayedTestimonials = Testimonial::active()->ordered()->limit(3)->get();
        
        foreach ($displayedTestimonials as $testimonial) {
            $response->assertSee($testimonial->name);
            $response->assertSee($testimonial->country);
            $response->assertSee($testimonial->message);
        }
        
        // Verify inactive testimonials are NOT displayed
        $response->assertDontSee('Inactive Guest 1');
        $response->assertDontSee('Inactive Guest 2');
    }

    /**
     * Property 2: Preservation - Admin Dashboard Main Page Unchanged
     * 
     * Test that the main admin dashboard page continues to work correctly
     * and is unaffected by the testimonials fix.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.3**
     * 
     * @return void
     */
    public function test_admin_dashboard_main_page_unchanged(): void
    {
        // Navigate to admin dashboard as admin
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/dashboard');
        
        // Verify the page loads successfully
        $response->assertStatus(200);
        
        // Verify Inertia component is rendered
        $response->assertInertia(fn ($page) => $page
            ->component('Admin/Dashboard')
        );
    }

    /**
     * Property 2: Preservation - Content Management Index Page Unchanged
     * 
     * Test that the content management index page (listing all content sections)
     * continues to work correctly and includes testimonials in the list.
     * 
     * EXPECTED OUTCOME: This test PASSES on both unfixed and fixed code
     * 
     * **Validates: Requirement 3.3**
     * 
     * @return void
     */
    public function test_content_management_index_page_unchanged(): void
    {
        // Navigate to content management index as admin
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/content');
        
        // Verify the page loads successfully
        $response->assertStatus(200);
        
        // Verify Inertia component is rendered
        $response->assertInertia(fn ($page) => $page
            ->component('Admin/Content/Index')
            ->has('pages')
        );
        
        // Verify testimonials is in the pages list
        $response->assertInertia(fn ($page) => $page
            ->where('pages.testimonials', 'Testimonials')
        );
    }
}
