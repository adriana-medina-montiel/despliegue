<?php

namespace App\Http\Controllers\Admin\Conocenos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('conocenos', 'careers') ?? abort(404);
        $items = $section->items;
        return view('admin.conocenos.careers', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'  => 'required|string|max:80',
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'email'       => 'required|email|max:255',
        ]);

        $section = PageSection::get('conocenos', 'careers') ?? abort(404);

        $section->update([
            'content' => [
                'badge_text'  => $request->badge_text,
                'title'       => $request->title,
                'description' => $request->description,
                'email'       => $request->email,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        foreach ($request->input('item_label', []) as $i => $label) {
            if (! trim($label)) {
                continue;
            }
            $section->items()->create([
                'sort_order' => $i,
                'data' => ['label' => $label],
            ]);
        }

        return redirect()->route('admin.conocenos.careers.edit')
            ->with('success', 'Sección de carreras actualizada correctamente.');
    }
}
