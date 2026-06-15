<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Admin\Inicio\Concerns\UpdatesSectionImage;
use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class DevopsController extends Controller
{
    use UpdatesSectionImage;

    public function edit()
    {
        $section = PageSection::get('inicio', 'devops') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.devops', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker' => 'required|string|max:100',
            'title'  => 'required|string|max:255',
            'lead'   => 'required|string|max:2000',
            'image'  => 'nullable|image|max:4096',
            'item_text.*' => 'required|string|max:500',
        ]);

        $section = PageSection::get('inicio', 'devops') ?? abort(404);
        $content = $section->content ?? [];

        $content['kicker'] = $request->kicker;
        $content['title']  = $request->title;
        $content['lead']   = $request->lead;

        $this->updateImageField($content, $request, 'image', 'inicio/devops');

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        foreach ($request->input('item_text', []) as $i => $text) {
            if (trim($text) === '') {
                continue;
            }
            $section->items()->create([
                'sort_order' => $i,
                'data'       => ['text' => $text],
            ]);
        }

        return redirect()->route('admin.inicio.devops.edit')
            ->with('success', 'Sección DevOps actualizada correctamente.');
    }
}
