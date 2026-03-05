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
            'travelguide' => 'Travel Guide'
        ];

        return Inertia::render('Admin/Content/Index', [
            'pages' => $pages
        ]);
    }

    public function edit($page)
    {
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
}
