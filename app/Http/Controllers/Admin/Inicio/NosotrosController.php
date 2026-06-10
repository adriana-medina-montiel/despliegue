<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NosotrosController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'nosotros') ?? abort(404);
        return view('admin.inicio.nosotros', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'  => 'required|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'image'       => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('inicio', 'nosotros') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        if ($request->hasFile('image')) {
            $old = $content['image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $content['image'] = $request->file('image')
                ->store('inicio/nosotros', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.inicio.nosotros.edit')
            ->with('success', 'Sección Nosotros actualizada correctamente.');
    }
}
