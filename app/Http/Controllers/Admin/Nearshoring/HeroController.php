<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'hero'],
            ['content' => [], 'is_visible' => true]
        );
        return view('admin.nearshoring.hero', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'       => 'required|string|max:80',
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:600',
            'background_image' => 'nullable|image|max:4096',
        ]);

        $section = PageSection::firstOrCreate(['page_slug' => 'nearshoring', 'section_key' => 'hero']);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        if ($request->hasFile('background_image')) {
            $old = $content['background_image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $content['background_image'] = $request->file('background_image')->store('nearshoring/hero', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.nearshoring.hero.edit')
                         ->with('success', 'Sección actualizada correctamente.');
    }
}