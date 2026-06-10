<?php

namespace App\Http\Controllers\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class NearshoringController extends Controller
{
    // Este método listará todas las secciones (como en tu imagen de 'Conócenos')
    public function index()
    {
        // Aquí traeremos todas las secciones que tengan page_slug = 'nearshoring'
        $sections = PageSection::where('page_slug', 'nearshoring')->get();
        return view('admin.nearshoring.index', compact('sections'));
    }

    // Este método abrirá el editor de cada sección
    public function edit($section_key)
    {
        $section = PageSection::where('page_slug', 'nearshoring')
                              ->where('section_key', $section_key)
                              ->firstOrFail();
        
        return view('admin.nearshoring.edit', compact('section'));
    }

    // Este método guardará los cambios
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