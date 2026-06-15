<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StackController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('inicio', 'stack') ?? abort(404);
        $items   = $section->items;

        return view('admin.inicio.stack', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'           => 'required|string|max:100',
            'title'            => 'required|string|max:255',
            'description'      => 'required|string|max:2000',
            'cta_text'         => 'required|string|max:100',
            'cta_url'          => 'required|string|max:255',
            'item_name.*'      => 'required|string|max:100',
            'item_description.*' => 'required|string|max:200',
            'item_url.*'       => 'required|string|max:255',
            'item_logo.*'      => 'nullable|string|max:255',
            'item_logo_new.*'  => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('inicio', 'stack') ?? abort(404);

        $section->update([
            'content' => [
                'kicker'      => $request->kicker,
                'title'       => $request->title,
                'description' => $request->description,
                'cta_text'    => $request->cta_text,
                'cta_url'     => $request->cta_url,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $oldItems = $section->items()->get()->keyBy('sort_order');
        $section->items()->delete();

        $names  = $request->input('item_name', []);
        $descs  = $request->input('item_description', []);
        $urls   = $request->input('item_url', []);
        $logos  = $request->input('item_logo', []);
        $newLogos = $request->file('item_logo_new', []);

        foreach ($names as $i => $name) {
            $logo = $logos[$i] ?? '';

            if (! empty($newLogos[$i])) {
                $oldLogo = $oldItems->get($i)?->data('logo', '');
                if ($oldLogo && ! str_starts_with($oldLogo, 'http') && ! str_starts_with($oldLogo, 'img/')) {
                    Storage::disk('public')->delete($oldLogo);
                }
                $logo = $newLogos[$i]->store('inicio/stack', 'public');
            }

            $section->items()->create([
                'sort_order' => $i,
                'data'       => [
                    'name'        => $name,
                    'description' => $descs[$i] ?? '',
                    'url'         => $urls[$i] ?? '',
                    'logo'        => $logo,
                ],
            ]);
        }

        return redirect()->route('admin.inicio.stack.edit')
            ->with('success', 'Sección Stack actualizada correctamente.');
    }
}
