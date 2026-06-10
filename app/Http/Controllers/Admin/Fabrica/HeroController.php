<?php

namespace App\Http\Controllers\Admin\Fabrica;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('fabrica', 'hero') ?? abort(404);
        return view('admin.fabrica.hero', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'       => 'required|string|max:100',
            'tag'              => 'required|string|max:100',
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:1000',
            'background_image' => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('fabrica', 'hero') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['tag']         = $request->tag;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        if ($request->hasFile('background_image')) {
            $old = $content['background_image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $content['background_image'] = $request->file('background_image')
                ->store('fabrica/hero', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.fabrica.hero.edit')
            ->with('success', 'Banner principal de Fábrica actualizado correctamente.');
    }
}
