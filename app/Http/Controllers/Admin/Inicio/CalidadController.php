<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalidadController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'calidad') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.calidad', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'      => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'item_name.*' => 'required|string|max:100',
            'item_file.*' => 'nullable|string|max:255',
            'item_cdn.*'  => 'nullable|string|max:500',
            'item_logo_new.*' => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('inicio', 'calidad') ?? abort(404);

        $section->update([
            'content' => [
                'kicker'      => $request->kicker,
                'title'       => $request->title,
                'description' => $request->description,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $oldItems = $section->items()->get()->keyBy('sort_order');
        $section->items()->delete();

        $names    = $request->input('item_name', []);
        $files    = $request->input('item_file', []);
        $cdns     = $request->input('item_cdn', []);
        $newLogos = $request->file('item_logo_new', []);

        foreach ($names as $i => $name) {
            $file = $files[$i] ?? '';

            if (! empty($newLogos[$i])) {
                $oldFile = $oldItems->get($i)?->data('file', '');
                if ($oldFile && ! str_starts_with($oldFile, 'http') && ! str_starts_with($oldFile, 'img/')) {
                    Storage::disk('public')->delete($oldFile);
                }
                $file = $newLogos[$i]->store('inicio/calidad', 'public');
            }

            $section->items()->create([
                'sort_order' => $i,
                'data'       => [
                    'name' => $name,
                    'file' => $file,
                    'cdn'  => $cdns[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.inicio.calidad.edit')
            ->with('success', 'Sección Calidad actualizada correctamente.');
    }
}
