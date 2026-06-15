<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NearshController extends Controller
{
    public function edit()
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'nearshoring'],
            ['content' => ['title' => '', 'description' => '', 'background_image' => ''], 'is_visible' => true]
        );
        return view('admin.nearshoring.nearsh', compact('section'));
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'background_image' => 'nullable|image|max:4096',
        ]);

        $section = PageSection::where(['page_slug' => 'nearshoring', 'section_key' => 'nearshoring'])->firstOrFail();
        $content = $section->content ?? [];

        $content['title'] = $request->title;
        $content['description'] = $request->description;

        if ($request->hasFile('background_image')) {
            // Lógica para borrar imagen vieja y subir nueva (igual que en Hero)
            if (!empty($content['background_image']) && !str_starts_with($content['background_image'], 'http')) {
                Storage::disk('public')->delete($content['background_image']);
            }
            $content['background_image'] = $request->file('background_image')->store('nearshoring/nearsh', 'public');
        }

        $section->update([
            'content' => $content,
            'is_visible' => $request->has('is_visible') ? true : false,
        ]);

        return redirect()->route('admin.nearshoring.nearsh.edit')->with('success', 'Sección actualizada.');
    }
}