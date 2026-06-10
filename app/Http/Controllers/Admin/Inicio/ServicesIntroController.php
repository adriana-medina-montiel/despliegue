<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class ServicesIntroController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'services_intro') ?? abort(404);
        return view('admin.inicio.services_intro', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'  => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $section = PageSection::get('inicio', 'services_intro') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.inicio.services_intro.edit')
            ->with('success', 'Introducción de servicios actualizada correctamente.');
    }
}
