<?php

namespace App\Http\Controllers\Admin\Productos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('productos', 'hero') ?? abort(404);
        return view('admin.productos.hero', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:1000',
            'background_image' => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('productos', 'hero') ?? abort(404);
        $content = $section->content ?? [];

        $content['title']       = $request->title;
        $content['description'] = $request->description;

        if ($request->hasFile('background_image')) {
            $old = $content['background_image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $content['background_image'] = $request->file('background_image')->store('productos/hero', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.productos.hero.edit')
            ->with('success', 'Banner principal de Productos actualizado correctamente.');
    }
}
