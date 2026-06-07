<?php

namespace App\Http\Controllers\Admin\Conocenos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialsController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('conocenos', 'testimonials') ?? abort(404);
        $items   = $section->items()->orderBy('sort_order')->get();

        return view('admin.conocenos.testimonials', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'          => 'required|string|max:80',
            'title'               => 'required|string|max:200',
            'item_quote.*'        => 'required|string|max:1000',
            'item_author_name.*'  => 'required|string|max:100',
            'item_author_role.*'  => 'nullable|string|max:200',
            'item_logo_new.*'     => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('conocenos', 'testimonials') ?? abort(404);

        $section->update([
            'content' => [
                'badge_text' => $request->badge_text,
                'title'      => $request->title,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        // Collect old local paths before deleting items
        $oldLocalFiles = $section->items()->get()
            ->map(fn($item) => $item->data('logo_image', ''))
            ->filter(fn($img) => $img && !str_starts_with($img, 'http'))
            ->values()->toArray();

        $section->items()->delete();

        $quotes         = array_slice($request->input('item_quote', []), 0, 10);
        $authorNames    = $request->input('item_author_name', []);
        $authorRoles    = $request->input('item_author_role', []);
        $existingLogos  = $request->input('item_logo_existing', []);
        $logoFiles      = $request->file('item_logo_new', []);

        $sortOrder     = 0;
        $newLocalFiles = [];

        foreach ($quotes as $idx => $quote) {
            if (trim($quote) === '') continue;

            $existing = $existingLogos[$idx] ?? '';
            $logo     = $existing;

            if (isset($logoFiles[$idx]) && $logoFiles[$idx]->isValid()) {
                if ($existing && !str_starts_with($existing, 'http')) {
                    Storage::disk('public')->delete($existing);
                }
                $logo = $logoFiles[$idx]->store('conocenos/testimonials', 'public');
            }

            if ($logo && !str_starts_with($logo, 'http')) {
                $newLocalFiles[] = $logo;
            }

            $section->items()->create([
                'sort_order' => $sortOrder++,
                'data' => [
                    'logo_image'  => $logo ?? '',
                    'quote'       => $quote,
                    'author_name' => $authorNames[$idx] ?? '',
                    'author_role' => $authorRoles[$idx] ?? '',
                ],
            ]);
        }

        foreach ($oldLocalFiles as $old) {
            if (!in_array($old, $newLocalFiles)) {
                Storage::disk('public')->delete($old);
            }
        }

        return redirect()->route('admin.conocenos.testimonials.edit')
            ->with('success', 'Sección "Testimonios" actualizada correctamente.');
    }
}
