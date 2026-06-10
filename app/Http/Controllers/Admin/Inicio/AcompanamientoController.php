<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Admin\Inicio\Concerns\UpdatesSectionImage;
use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class AcompanamientoController extends Controller
{
    use UpdatesSectionImage;

    public function edit()
    {
        $section = PageSection::get('inicio', 'acompanamiento') ?? abort(404);

        return view('admin.inicio.acompanamiento', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'      => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'paragraph_1' => 'required|string|max:2000',
            'paragraph_2' => 'required|string|max:2000',
            'image'       => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('inicio', 'acompanamiento') ?? abort(404);
        $content = $section->content ?? [];

        $content['kicker']      = $request->kicker;
        $content['title']       = $request->title;
        $content['paragraph_1'] = $request->paragraph_1;
        $content['paragraph_2'] = $request->paragraph_2;

        $this->updateImageField($content, $request, 'image', 'inicio/acompanamiento');

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.inicio.acompanamiento.edit')
            ->with('success', 'Sección Acompañamiento actualizada correctamente.');
    }
}
