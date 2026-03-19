<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccommodationController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Accommodations/Index', [
            'accommodations' => Accommodation::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:100',
            'type'             => 'required|string|max:50',
            'description'      => 'required|string|max:500',
            'location'         => 'required|string|max:100',
            'image'            => 'nullable|string|max:255',
            'website_url'      => 'nullable|url|max:255',
            'whatsapp_number'  => 'nullable|string|max:20',
        ]);

        Accommodation::create($validated + ['is_active' => true]);
        return back()->with('success', 'Accommodation added successfully!');
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:100',
            'type'             => 'required|string|max:50',
            'description'      => 'required|string|max:500',
            'location'         => 'required|string|max:100',
            'image'            => 'nullable|string|max:255',
            'website_url'      => 'nullable|url|max:255',
            'whatsapp_number'  => 'nullable|string|max:20',
        ]);

        $accommodation->update($validated);
        return back()->with('success', 'Accommodation updated successfully!');
    }

    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();
        return back()->with('success', 'Accommodation deleted!');
    }

    public function toggle(Accommodation $accommodation)
    {
        $accommodation->update(['is_active' => !$accommodation->is_active]);
        return back()->with('success', $accommodation->is_active ? 'Accommodation activated!' : 'Accommodation hidden!');
    }
}
