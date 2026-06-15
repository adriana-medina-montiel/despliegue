<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'hero') ?? abort(404);
        $items = $section->items;
        return view('admin.inicio.hero', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'       => 'required|string|max:100',
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:1000',
            'background_image' => 'nullable|image|max:4096',
            'cta1_text'        => 'required|string|max:100',
            'cta1_url'         => 'required|string|max:255',
            'cta2_text'        => 'required|string|max:100',
            'cta2_url'         => 'required|string|max:255',
        ]);

        $section = PageSection::get('inicio', 'hero') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;
        $content['cta1_text']   = $request->cta1_text;
        $content['cta1_url']    = $request->cta1_url;
        $content['cta2_text']   = $request->cta2_text;
        $content['cta2_url']    = $request->cta2_url;

        if ($request->hasFile('background_image')) {
            $old = $content['background_image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $content['background_image'] = $request->file('background_image')
                ->store('inicio/hero', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        // Recreate stats items
        $section->items()->delete();
        $values = $request->input('item_value', []);
        $labels = $request->input('item_label', []);
        $icons = $request->input('item_icon', []);
        $colors = $request->input('item_color', []);

        foreach ($values as $i => $val) {
            $section->items()->create([
                'sort_order' => $i,
                'data' => [
                    'value' => $val,
                    'label' => $labels[$i] ?? '',
                    'icon'  => $icons[$i] ?? '',
                    'color' => $colors[$i] ?? '',
                ]
            ]);
        }

        return redirect()->route('admin.inicio.hero.edit')
            ->with('success', 'Sección hero y estadísticas actualizadas correctamente.');
    }
}
