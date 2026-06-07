<?php

namespace App\Http\Controllers\Admin\Conocenos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DifferentiatorsController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('conocenos', 'differentiators') ?? abort(404);
        return view('admin.conocenos.differentiators', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'         => 'required|string|max:100',
            'title'              => 'required|string|max:255',
            'header_description' => 'required|string|max:500',
            'body_text'          => 'required|string|max:800',
            'diagram_caption'    => 'required|string|max:100',
            'medal_image'        => 'nullable|image|max:4096',
            'diagram_image'      => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('conocenos', 'differentiators') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']         = $request->badge_text;
        $content['title']              = $request->title;
        $content['header_description'] = $request->header_description;
        $content['body_text']          = $request->body_text;
        $content['diagram_caption']    = $request->diagram_caption;

        foreach (['medal_image' => 'medal', 'diagram_image' => 'diagram'] as $field => $folder) {
            if ($request->hasFile($field)) {
                $old = $content[$field] ?? null;
                if ($old && !str_starts_with($old, 'http')) {
                    Storage::disk('public')->delete($old);
                }
                $content[$field] = $request->file($field)->store("conocenos/differentiators/{$folder}", 'public');
            }
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.conocenos.differentiators.edit')
            ->with('success', 'Sección "¿Por qué elegirnos?" actualizada correctamente.');
    }
}
