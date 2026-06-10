<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Admin\Inicio\Concerns\UpdatesSectionImage;
use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class BituyuPreviewController extends Controller
{
    use UpdatesSectionImage;

    public function edit()
    {
        $section = PageSection::get('inicio', 'bituyu_preview') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.bituyu_preview', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'        => 'required|string|max:100',
            'title'         => 'required|string|max:255',
            'description'   => 'required|string|max:2000',
            'diagram_image' => 'nullable|image|max:4096',
            'cta_text'      => 'required|string|max:100',
            'cta_url'       => 'required|string|max:255',
            'item_value.*'  => 'required|string|max:50',
            'item_label.*'  => 'required|string|max:100',
        ]);

        $section = PageSection::get('inicio', 'bituyu_preview') ?? abort(404);
        $content = $section->content ?? [];

        $content['kicker']      = $request->kicker;
        $content['title']       = $request->title;
        $content['description'] = $request->description;
        $content['cta_text']    = $request->cta_text;
        $content['cta_url']     = $request->cta_url;

        $this->updateImageField($content, $request, 'diagram_image', 'inicio/bituyu_preview');

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        $values = $request->input('item_value', []);
        $labels = $request->input('item_label', []);

        foreach ($values as $i => $value) {
            $section->items()->create([
                'sort_order' => $i,
                'data'       => [
                    'value' => $value,
                    'label' => $labels[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.inicio.bituyu_preview.edit')
            ->with('success', 'Sección Bituyú Preview actualizada correctamente.');
    }
}
