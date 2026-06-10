<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RseController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'rse') ?? abort(404);
        $items   = $section->items;
        $points  = $items->filter(fn ($i) => $i->data('kind') === 'point');
        $logos   = $items->filter(fn ($i) => $i->data('kind') === 'logo');

        return view('admin.inicio.rse', compact('section', 'points', 'logos'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'           => 'required|string|max:100',
            'title'            => 'required|string|max:255',
            'point_icon.*'     => 'required|string|max:50',
            'point_text.*'     => 'required|string|max:2000',
            'logo_alt.*'       => 'required|string|max:100',
            'logo_file.*'      => 'nullable|string|max:255',
            'logo_cdn.*'       => 'nullable|string|max:500',
            'logo_image_new.*' => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('inicio', 'rse') ?? abort(404);

        $section->update([
            'content' => [
                'kicker' => $request->kicker,
                'title'  => $request->title,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $oldLogos = $section->items()->get()
            ->filter(fn ($i) => $i->data('kind') === 'logo')
            ->values()
            ->keyBy(fn ($i, $k) => $k);

        $section->items()->delete();

        $sort = 0;
        $icons = $request->input('point_icon', []);
        $texts = $request->input('point_text', []);

        foreach ($icons as $i => $icon) {
            $section->items()->create([
                'sort_order' => $sort++,
                'data'       => [
                    'kind' => 'point',
                    'icon' => $icon,
                    'text' => $texts[$i] ?? '',
                ],
            ]);
        }

        $alts     = $request->input('logo_alt', []);
        $files    = $request->input('logo_file', []);
        $cdns     = $request->input('logo_cdn', []);
        $newLogos = $request->file('logo_image_new', []);

        foreach ($alts as $i => $alt) {
            $file = $files[$i] ?? '';

            if (! empty($newLogos[$i])) {
                $oldFile = $oldLogos->get($i)?->data('file', '') ?? '';
                if ($oldFile && ! str_starts_with($oldFile, 'http') && ! str_starts_with($oldFile, 'img/')) {
                    Storage::disk('public')->delete($oldFile);
                }
                $file = $newLogos[$i]->store('inicio/rse', 'public');
            }

            $section->items()->create([
                'sort_order' => $sort++,
                'data'       => [
                    'kind' => 'logo',
                    'alt'  => $alt,
                    'file' => $file,
                    'cdn'  => $cdns[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.inicio.rse.edit')
            ->with('success', 'Sección RSE actualizada correctamente.');
    }
}
