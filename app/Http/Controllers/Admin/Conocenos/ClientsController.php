<?php

namespace App\Http\Controllers\Admin\Conocenos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    public function edit()
    {
        $section        = PageSection::get('conocenos', 'clients') ?? abort(404);
        $items          = $section->items()->orderBy('sort_order')->get();
        $itemsBySector  = $items->groupBy(fn($item) => (int) $item->data('sector', 0));

        return view('admin.conocenos.clients', compact('section', 'items', 'itemsBySector'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'        => 'required|string|max:80',
            'title'             => 'required|string|max:200',
            'description'       => 'required|string|max:500',
            'sector_name.*'     => 'required|string|max:60',
            'sector_tag.*'      => 'required|string|max:80',
            'logo_alt.*'        => 'nullable|string|max:100',
            'logo_image_new.*'  => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('conocenos', 'clients') ?? abort(404);

        // Collect old local paths before deleting
        $oldLocalFiles = $section->items()->get()
            ->map(fn($item) => $item->data('image', ''))
            ->filter(fn($img) => $img && !str_starts_with($img, 'http'))
            ->values()->toArray();

        // Build updated sectors array
        $sectorNames = $request->input('sector_name', []);
        $sectorTags  = $request->input('sector_tag',  []);
        $sectors = [];
        foreach ($sectorNames as $i => $name) {
            $sectors[] = ['name' => $name, 'tag' => $sectorTags[$i] ?? $name];
        }

        $section->update([
            'content' => [
                'badge_text'  => $request->badge_text,
                'title'       => $request->title,
                'description' => $request->description,
                'sectors'     => $sectors,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        // Rebuild logos
        $section->items()->delete();

        $logoSectors   = $request->input('logo_sector',         []);
        $logoAlts      = $request->input('logo_alt',            []);
        $logoExisting  = $request->input('logo_existing_image', []);
        $logoFiles     = $request->file('logo_image_new',       []);

        $sortOrder    = 0;
        $newLocalFiles = [];

        // Count per sector to enforce max 10
        $sectorCount = array_fill(0, count($sectors), 0);

        foreach ($logoSectors as $idx => $sectorIdx) {
            $sectorIdx = (int) $sectorIdx;
            if (($sectorCount[$sectorIdx] ?? 0) >= 10) continue;

            $existing = $logoExisting[$idx] ?? '';
            $image    = $existing;

            if (isset($logoFiles[$idx]) && $logoFiles[$idx]->isValid()) {
                if ($existing && !str_starts_with($existing, 'http')) {
                    Storage::disk('public')->delete($existing);
                }
                $image = $logoFiles[$idx]->store('conocenos/clients', 'public');
            }

            if (!$image) continue;

            if (!str_starts_with($image, 'http')) {
                $newLocalFiles[] = $image;
            }

            $section->items()->create([
                'sort_order' => $sortOrder++,
                'data' => [
                    'sector' => $sectorIdx,
                    'image'  => $image,
                    'alt'    => $logoAlts[$idx] ?? '',
                ],
            ]);

            $sectorCount[$sectorIdx]++;
        }

        // Clean up removed local files
        foreach ($oldLocalFiles as $old) {
            if (!in_array($old, $newLocalFiles)) {
                Storage::disk('public')->delete($old);
            }
        }

        return redirect()->route('admin.conocenos.clients.edit')
            ->with('success', 'Sección "Clientes" actualizada correctamente.');
    }
}
