<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TourGuideController extends Controller
{
    public function index()
    {
        $guides = TourGuide::ordered()->paginate(10);

        return Inertia::render('Admin/TourGuides/Index', [
            'guides' => $guides
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/TourGuides/Create');
    }

    public function store(Request $request)
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

        TourGuide::create($validated);

        return redirect()->route('admin.tour-guides.index')
            ->with('success', 'Tour guide added successfully');
    }

    public function edit($id)
    {
        $guide = TourGuide::findOrFail($id);

        return Inertia::render('Admin/TourGuides/Edit', [
            'guide' => $guide
        ]);
    }

    public function update(Request $request, $id)
    {
        $guide = TourGuide::findOrFail($id);

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

        return redirect()->route('admin.tour-guides.index')
            ->with('success', 'Tour guide updated successfully');
    }

    public function destroy($id)
    {
        $guide = TourGuide::findOrFail($id);
        $guide->delete();

        return redirect()->back()->with('success', 'Tour guide deleted successfully');
    }
}
