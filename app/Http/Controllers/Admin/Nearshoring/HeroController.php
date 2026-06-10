<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('nearshoring', 'hero') ?? abort(404);
        return view('admin.nearshoring.hero', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'  => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $section = PageSection::get('nearshoring', 'hero') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.nearshoring.hero.edit')
            ->with('success', 'Banner principal de Nearshoring actualizado correctamente.');
    }
}
