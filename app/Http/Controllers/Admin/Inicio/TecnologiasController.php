<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class TecnologiasController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'tecnologias') ?? abort(404);

        return view('admin.inicio.tecnologias', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'      => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'quote'       => 'required|string|max:500',
        ]);

        $section = PageSection::get('inicio', 'tecnologias') ?? abort(404);

        $section->update([
            'content' => [
                'kicker'      => $request->kicker,
                'title'       => $request->title,
                'description' => $request->description,
                'quote'       => $request->quote,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.inicio.tecnologias.edit')
            ->with('success', 'Sección Tecnologías actualizada correctamente.');
    }
}
