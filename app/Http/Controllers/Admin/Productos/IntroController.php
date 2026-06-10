<?php

namespace App\Http\Controllers\Admin\Productos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('productos', 'intro') ?? abort(404);
        $items = $section->items;
        return view('admin.productos.intro', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'  => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'item_icon'   => 'nullable|array',
            'item_title'  => 'nullable|array',
            'item_text'   => 'nullable|array',
        ]);

        $section = PageSection::get('productos', 'intro') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        // Delete and recreate features bar items
        $section->items()->delete();

        $icons  = $request->input('item_icon', []);
        $titles = $request->input('item_title', []);
        $texts  = $request->input('item_text', []);

        foreach ($titles as $i => $title) {
            if (empty($title)) continue;
            $section->items()->create([
                'sort_order' => $i,
                'data' => [
                    'icon'  => $icons[$i] ?? 'fas fa-check icon-blue',
                    'title' => $title,
                    'text'  => $texts[$i] ?? '',
                ]
            ]);
        }

        return redirect()->route('admin.productos.intro.edit')
            ->with('success', 'Introducción de Productos actualizada correctamente.');
    }
}
