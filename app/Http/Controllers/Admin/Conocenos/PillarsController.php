<?php

namespace App\Http\Controllers\Admin\Conocenos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PillarsController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('conocenos', 'pillars') ?? abort(404);
        $items   = $section->items()->orderBy('sort_order')->get();
        return view('admin.conocenos.pillars', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string|max:600',
            'item_label.*'      => 'required|string|max:80',
            'item_image_new.*'  => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('conocenos', 'pillars') ?? abort(404);

        // Update header content
        $section->update([
            'content'    => ['title' => $request->title, 'description' => $request->description],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        // Rebuild items (max 4)
        $labels      = array_slice($request->input('item_label', []), 0, 4);
        $existingImgs = array_slice($request->input('item_existing_image', []), 0, 4);
        $newFiles    = $request->file('item_image_new', []);

        // Track old local images that are being replaced
        $oldItems = $section->items()->orderBy('sort_order')->get()->keyBy(fn($i) => $i->sort_order);

        $section->items()->delete();

        foreach ($labels as $idx => $label) {
            $image = $existingImgs[$idx] ?? '';

            if (!empty($newFiles[$idx])) {
                // Delete old local file if applicable
                $oldImg = $oldItems->get($idx)?->data('image', '');
                if ($oldImg && !str_starts_with($oldImg, 'http')) {
                    Storage::disk('public')->delete($oldImg);
                }
                $image = $newFiles[$idx]->store('conocenos/pillars', 'public');
            }

            $section->items()->create([
                'sort_order' => $idx,
                'data'       => ['label' => $label, 'image' => $image],
            ]);
        }

        return redirect()->route('admin.conocenos.pillars.edit')
            ->with('success', 'Sección "Pilares" actualizada correctamente.');
    }
}
