<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::ordered()->paginate(10);

        return Inertia::render('Admin/Testimonials/Index', [
            'testimonials' => $testimonials
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Testimonials/Create');
    }

    public function store(Request $request)
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

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return Inertia::render('Admin/Testimonials/Edit', [
            'testimonial' => $testimonial
        ]);
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

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

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->back()->with('success', 'Testimonial deleted successfully');
    }

    public function publicSubmit(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:100',
            'country'    => 'required|string|max:100',
            'message'    => 'required|string|min:20|max:500',
            'rating'     => 'required|integer|min:1|max:5',
            'visit_date' => 'nullable|date|before:today',
        ]);

        Testimonial::create([
            'name'        => $validated['name'],
            'country'     => $validated['country'],
            'message'     => $validated['message'],
            'rating'      => $validated['rating'],
            'visit_date'  => $validated['visit_date'] ?? null,
            'is_active'   => true,
            'is_approved' => false,
            'is_featured' => false,
            'order'       => 0,
        ]);

        return back()->with('testimonial_success', 'Thank you! Your review has been submitted and will appear after approval.');
    }

    public function toggleApproval($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['is_approved' => !$testimonial->is_approved]);

        return redirect()->back()->with('success', 'Testimonial approval status updated.');
    }
}
