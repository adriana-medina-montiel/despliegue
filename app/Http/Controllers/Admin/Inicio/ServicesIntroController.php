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
            'card1_title' => 'nullable|string|max:120',
            'card1_desc'  => 'nullable|string|max:500',
            'card1_icon'  => 'nullable|integer|between:0,5',
            'card2_title' => 'nullable|string|max:120',
            'card2_desc'  => 'nullable|string|max:500',
            'card2_icon'  => 'nullable|integer|between:0,5',
            'card3_title' => 'nullable|string|max:120',
            'card3_desc'  => 'nullable|string|max:500',
            'card3_icon'  => 'nullable|integer|between:0,5',
        ]);

        $section = PageSection::get('inicio', 'services_intro') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        foreach ([1, 2, 3] as $ci) {
            $content["card{$ci}_title"] = $request->input("card{$ci}_title");
            $content["card{$ci}_desc"]  = $request->input("card{$ci}_desc");
            $content["card{$ci}_icon"]  = $request->input("card{$ci}_icon", $ci - 1);
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.inicio.services_intro.edit')
            ->with('success', 'Servicios Destacados actualizado correctamente.');
    }
}
