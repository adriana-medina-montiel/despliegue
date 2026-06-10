<?php

namespace App\Http\Controllers\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class NearshoringController extends Controller
{
  
    public function index()
    {

        $sections = PageSection::where('page_slug', 'nearshoring')->get();
        return view('admin.nearshoring.index', compact('sections'));
    }

    public function edit($section_key)
    {
        $section = PageSection::where('page_slug', 'nearshoring')
                              ->where('section_key', $section_key)
                              ->firstOrFail();
        
        return view('admin.nearshoring.edit', compact('section'));
    }

   
    public function update(Request $request, $section_key)
    {
        $section = PageSection::where('page_slug', 'nearshoring')
                              ->where('section_key', $section_key)
                              ->firstOrFail();

        $section->update([
            'content' => $request->content,
            'is_visible' => $request->has('is_visible'),
        ]);

        return back()->with('success', 'Sección actualizada correctamente.');
    }
}