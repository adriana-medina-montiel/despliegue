<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class CtaController extends Controller
{
    /**
     * Muestra el formulario de edición para el CTA.
     */
    public function edit()
    {
        // Usamos firstOrCreate para garantizar que SIEMPRE exista un objeto
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'cta'],
            [
                'content' => [
                    'title' => 'Título por defecto',
                    'description' => 'Descripción por defecto',
                    'button_text' => 'Contáctanos'
                ],
                'is_visible' => true
            ]
        );

        return view('admin.nearshoring.cta', compact('section'));
    }
   public function update(Request $request){
        $section = \App\Models\PageSection::where('page_slug', 'nearshoring')
            ->where('section_key', 'cta')
            ->firstOrFail();

        $content = [
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
        ];

        $section->update([
            'content' => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return back()->with(
            'success',
            'La sección CTA ha sido actualizada correctamente.'
        );
    }
}