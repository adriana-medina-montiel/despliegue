<?php

namespace App\Http\Controllers\Admin\Fabrica;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('fabrica', 'band') ?? abort(404);
        return view('admin.fabrica.band', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'lead'     => 'required|string|max:1000',
            'cta_text' => 'required|string|max:100',
            'cta_url'  => 'required|string|max:255',
            'image'    => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('fabrica', 'band') ?? abort(404);
        $content = $section->content ?? [];

        $content['title']    = $request->title;
        $content['lead']     = $request->lead;
        $content['cta_text'] = $request->cta_text;
        $content['cta_url']  = $request->cta_url;

        if ($request->hasFile('image')) {
            $old = $content['image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $content['image'] = $request->file('image')
                ->store('fabrica/band', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.fabrica.band.edit')
            ->with('success', 'Banda de cierre de Fábrica actualizada correctamente.');
    }
}
