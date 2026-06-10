<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class PropuestaController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('nearshoring', 'propuesta_valor') ?? abort(404);
        $items = $section->items;
        return view('admin.nearshoring.propuesta', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'cta_text'    => 'required|string|max:100',
            'cta_url'     => 'required|string|max:255',
            'item_title'  => 'nullable|array',
            'item_icon'   => 'nullable|array',
            'item_desc'   => 'nullable|array',
        ]);

        $section = PageSection::get('nearshoring', 'propuesta_valor') ?? abort(404);
        $content = $section->content ?? [];

        $content['description'] = $request->description;
        $content['cta_text']    = $request->cta_text;
        $content['cta_url']     = $request->cta_url;

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        // Delete and recreate items
        $section->items()->delete();

        $titles = $request->input('item_title', []);
        $icons  = $request->input('item_icon', []);
        $descs  = $request->input('item_desc', []);

        foreach ($titles as $i => $title) {
            if (empty($title)) continue;
            $section->items()->create([
                'sort_order' => $i,
                'data' => [
                    'title'       => $title,
                    'icon'        => $icons[$i] ?? 'fas fa-check',
                    'description' => $descs[$i] ?? '',
                ]
            ]);
        }

        return redirect()->route('admin.nearshoring.propuesta.edit')
            ->with('success', 'Propuesta de valor de Nearshoring actualizada correctamente.');
    }
}
