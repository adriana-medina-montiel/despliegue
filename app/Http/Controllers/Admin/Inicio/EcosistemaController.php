<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcosistemaController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'ecosistema') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.ecosistema', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'         => 'required|string|max:100',
            'title'          => 'required|string|max:255',
            'description'    => 'required|string|max:2000',
            'highlight_text' => 'required|string|max:1000',
            'cta_text'       => 'required|string|max:100',
            'cta_url'        => 'required|string|max:255',
            'item_alt.*'     => 'required|string|max:100',
            'item_text.*'    => 'required|string|max:500',
            'item_file.*'    => 'nullable|string|max:255',
            'item_cdn.*'     => 'nullable|string|max:500',
            'item_logo_new.*'=> 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('inicio', 'ecosistema') ?? abort(404);

        $section->update([
            'content' => [
                'kicker'         => $request->kicker,
                'title'          => $request->title,
                'description'    => $request->description,
                'highlight_text' => $request->highlight_text,
                'cta_text'       => $request->cta_text,
                'cta_url'        => $request->cta_url,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $oldItems = $section->items()->get()->keyBy('sort_order');
        $section->items()->delete();

        $alts     = $request->input('item_alt', []);
        $texts    = $request->input('item_text', []);
        $files    = $request->input('item_file', []);
        $cdns     = $request->input('item_cdn', []);
        $newLogos = $request->file('item_logo_new', []);

        foreach ($alts as $i => $alt) {
            $file = $files[$i] ?? '';

            if (! empty($newLogos[$i])) {
                $oldFile = $oldItems->get($i)?->data('file', '');
                if ($oldFile && ! str_starts_with($oldFile, 'http') && ! str_starts_with($oldFile, 'img/')) {
                    Storage::disk('public')->delete($oldFile);
                }
                $file = $newLogos[$i]->store('inicio/ecosistema', 'public');
            }

            $section->items()->create([
                'sort_order' => $i,
                'data'       => [
                    'alt'  => $alt,
                    'text' => $texts[$i] ?? '',
                    'file' => $file,
                    'cdn'  => $cdns[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.inicio.ecosistema.edit')
            ->with('success', 'Sección Ecosistema actualizada correctamente.');
    }
}
