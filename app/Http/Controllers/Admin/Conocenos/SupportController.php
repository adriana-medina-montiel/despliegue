<?php

namespace App\Http\Controllers\Admin\Conocenos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('conocenos', 'support') ?? abort(404);
        $items   = $section->items()->orderBy('sort_order')->get();
        return view('admin.conocenos.support', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'              => 'required|string|max:80',
            'title'                   => 'required|string|max:255',
            'description'             => 'required|string|max:600',
            'side_image'              => 'nullable|image|max:4096',
            'item_phase_title.*'      => 'required|string|max:100',
            'item_phase_description.*'=> 'required|string|max:200',
        ]);

        $section = PageSection::get('conocenos', 'support') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']  = $request->badge_text;
        $content['title']       = $request->title;
        $content['description'] = $request->description;

        if ($request->hasFile('side_image')) {
            $old = $content['side_image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $content['side_image'] = $request->file('side_image')->store('conocenos/support', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        // Rebuild timeline steps (max 5)
        $titles = array_slice($request->input('item_phase_title', []), 0, 5);
        $descs  = array_slice($request->input('item_phase_description', []), 0, 5);

        $section->items()->delete();

        foreach ($titles as $i => $title) {
            if (trim($title) === '') continue;
            $section->items()->create([
                'sort_order' => $i,
                'data' => [
                    'phase_title'       => $title,
                    'phase_description' => $descs[$i] ?? '',
                ],
            ]);
        }

        return redirect()->route('admin.conocenos.support.edit')
            ->with('success', 'Sección "Soporte 360°" actualizada correctamente.');
    }
}
