<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Admin\Inicio\Concerns\UpdatesSectionImage;
use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class CapacitacionController extends Controller
{
    use UpdatesSectionImage;

    public function edit()
    {
        $section = PageSection::get('inicio', 'capacitacion') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.capacitacion', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'        => 'required|string|max:100',
            'title'         => 'required|string|max:255',
            'quote'         => 'required|string|max:500',
            'image'         => 'nullable|image|max:4096',
            'item_value.*'  => 'required|string|max:50',
            'item_text.*'   => 'required|string|max:500',
        ]);

        $section = PageSection::get('inicio', 'capacitacion') ?? abort(404);
        $content = $section->content ?? [];

        $content['kicker'] = $request->kicker;
        $content['title']  = $request->title;
        $content['quote']  = $request->quote;

        $this->updateImageField($content, $request, 'image', 'inicio/capacitacion');

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        $values = $request->input('item_value', []);
        $texts  = $request->input('item_text', []);

        foreach ($values as $i => $value) {
            $section->items()->create([
                'sort_order' => $i,
                'data'       => [
                    'value' => $value,
                    'text'  => $texts[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.inicio.capacitacion.edit')
            ->with('success', 'Sección Capacitación actualizada correctamente.');
    }
}
