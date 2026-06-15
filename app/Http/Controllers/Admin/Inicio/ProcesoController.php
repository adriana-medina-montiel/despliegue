<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'proceso') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.proceso', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'              => 'required|string|max:500',
            'footer_text'        => 'required|string|max:1000',
            'item_title.*'       => 'required|string|max:100',
            'item_description.*' => 'required|string|max:1000',
        ]);

        $section = PageSection::get('inicio', 'proceso') ?? abort(404);

        $section->update([
            'content' => [
                'title'       => $request->title,
                'footer_text' => $request->footer_text,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        $titles = $request->input('item_title', []);
        $descs  = $request->input('item_description', []);

        foreach ($titles as $i => $title) {
            $section->items()->create([
                'sort_order' => $i,
                'data'       => [
                    'title'       => $title,
                    'description' => $descs[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.inicio.proceso.edit')
            ->with('success', 'Sección Proceso actualizada correctamente.');
    }
}
