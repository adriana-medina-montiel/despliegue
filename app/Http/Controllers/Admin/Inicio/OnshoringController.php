<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Admin\Inicio\Concerns\UpdatesSectionImage;
use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class OnshoringController extends Controller
{
    use UpdatesSectionImage;

    public function edit()
    {
        $section = PageSection::get('inicio', 'onshoring') ?? abort(404);

        return view('admin.inicio.onshoring', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'      => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'repse_text'  => 'required|string|max:2000',
            'image'       => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('inicio', 'onshoring') ?? abort(404);
        $content = $section->content ?? [];

        $content['kicker']      = $request->kicker;
        $content['title']       = $request->title;
        $content['description'] = $request->description;
        $content['repse_text']  = $request->repse_text;

        $this->updateImageField($content, $request, 'image', 'inicio/onshoring');

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.inicio.onshoring.edit')
            ->with('success', 'Sección Onshoring actualizada correctamente.');
    }
}
