<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class OnshoringController extends Controller
{
    public function edit()
    {

        $section = PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'onshoring'],
            ['content' => ['title' => '', 'description' => ''], 'is_visible' => true]
        );
        return view('admin.nearshoring.onshoring', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:600',
        ]);

        $section = PageSection::firstOrCreate(['page_slug' => 'nearshoring', 'section_key' => 'onshoring']);
        
        $content = $section->content ?? [];
        $content['title'] = $request->title;
        $content['description'] = $request->description;

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.nearshoring.onshoring.edit')
                         ->with('success', 'Sección actualizada correctamente.');
    }
}