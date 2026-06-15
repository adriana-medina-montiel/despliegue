<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class ValorController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'valor') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.valor', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'       => 'required|string|max:100',
            'title'        => 'required|string|max:255',
            'description'  => 'required|string|max:2000',
            'item_num.*'   => 'required|string|max:10',
            'item_title.*' => 'required|string|max:150',
            'item_text.*'  => 'required|string|max:500',
        ]);

        $section = PageSection::get('inicio', 'valor') ?? abort(404);

        $section->update([
            'content' => [
                'kicker'      => $request->kicker,
                'title'       => $request->title,
                'description' => $request->description,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        $nums   = $request->input('item_num', []);
        $titles = $request->input('item_title', []);
        $texts  = $request->input('item_text', []);

        foreach ($nums as $i => $num) {
            $section->items()->create([
                'sort_order' => $i,
                'data'       => [
                    'num'   => $num,
                    'title' => $titles[$i] ?? '',
                    'text'  => $texts[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.inicio.valor.edit')
            ->with('success', 'Sección Valor actualizada correctamente.');
    }
}
