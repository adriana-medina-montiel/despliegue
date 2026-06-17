<?php

namespace App\Http\Controllers\Admin\Conocenos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('conocenos', 'equipo') ?? abort(404);
        $items   = $section->items;

        return view('admin.conocenos.equipo', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'        => 'required|string|max:100',
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:2000',
            'item_label.*'  => 'required|string|max:100',
        ]);

        $section = PageSection::get('conocenos', 'equipo') ?? abort(404);

        $section->update([
            'content' => [
                'kicker'      => $request->kicker,
                'title'       => $request->title,
                'description' => $request->description,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        foreach ($request->input('item_label', []) as $i => $label) {
            if (trim($label) === '') {
                continue;
            }
            $section->items()->create([
                'sort_order' => $i,
                'data'       => ['label' => $label],
            ]);
        }

        return redirect()->route('admin.conocenos.equipo.edit')
            ->with('success', 'Sección Equipo actualizada correctamente.');
    }
}
