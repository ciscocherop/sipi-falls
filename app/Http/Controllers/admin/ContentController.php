<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContentController extends Controller
{
    public function index()
    {
        $pages = [
            'contact' => 'Contact Information',
            'about' => 'About Page',
            'travelguide' => 'Travel Guide',
            'tourguides' => 'Tour Guides',
            'testimonials' => 'Testimonials'
        ];

        return Inertia::render('Admin/Content/Index', [
            'pages' => $pages
        ]);
    }

    public function edit($page)
    {
        // Handle tour guides and testimonials differently
        if ($page === 'tourguides') {
            $tourGuides = \App\Models\TourGuide::ordered()->get();
            return Inertia::render('Admin/Content/TourGuides', [
                'page' => $page,
                'pageName' => 'Tour Guides',
                'tourGuides' => $tourGuides
            ]);
        }

        if ($page === 'testimonials') {
            $testimonials = \App\Models\Testimonial::ordered()->get();
            return Inertia::render('Admin/Content/Testimonials', [
                'page' => $page,
                'pageName' => 'Testimonials',
                'testimonials' => $testimonials
            ]);
        }

        // Handle regular content pages
        $contents = SiteContent::where('page', $page)->get();
        
        $pageNames = [
            'contact' => 'Contact Information',
            'about' => 'About Page',
            'travelguide' => 'Travel Guide'
        ];

        return Inertia::render('Admin/Content/Edit', [
            'page' => $page,
            'pageName' => $pageNames[$page] ?? ucfirst($page),
            'contents' => $contents
        ]);
    }

    public function update(Request $request, $page)
    {
        $validated = $request->validate([
            'contents' => 'required|array',
            'contents.*.key' => 'required|string',
            'contents.*.value' => 'required|string'
        ]);

        foreach ($validated['contents'] as $content) {
            SiteContent::updateContent($content['key'], $content['value']);
        }

        return redirect()->back()->with('success', 'Content updated successfully');
    }

    // Tour Guide Management Methods
    public function storeTourGuide(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'years_experience' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        \App\Models\TourGuide::create($validated);

        return redirect()->back()->with('success', 'Tour guide added successfully');
    }

    public function updateTourGuide(Request $request, $id)
    {
        $guide = \App\Models\TourGuide::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'years_experience' => 'required|integer|min:0',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        $guide->update($validated);

        return redirect()->back()->with('success', 'Tour guide updated successfully');
    }

    public function destroyTourGuide($id)
    {
        $guide = \App\Models\TourGuide::findOrFail($id);
        $guide->delete();

        return redirect()->back()->with('success', 'Tour guide deleted successfully');
    }

    // Testimonial Management Methods
    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'visit_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        \App\Models\Testimonial::create($validated);

        return redirect()->back()->with('success', 'Testimonial added successfully');
    }

    public function updateTestimonial(Request $request, $id)
    {
        $testimonial = \App\Models\Testimonial::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'visit_date' => 'nullable|date',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer'
        ]);

        $testimonial->update($validated);

        return redirect()->back()->with('success', 'Testimonial updated successfully');
    }

    public function destroyTestimonial($id)
    {
        $testimonial = \App\Models\Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }
}
