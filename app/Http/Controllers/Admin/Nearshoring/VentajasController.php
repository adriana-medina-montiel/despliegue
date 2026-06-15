<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VentajasController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('nearshoring', 'ventajas') ?? abort(404);
        return view('admin.nearshoring.ventajas', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text'            => 'required|string|max:100',
            'title'                 => 'required|string|max:255',
            'description'           => 'required|string|max:1000',
            'repse_text'            => 'required|string|max:1000',
            'image'                 => 'nullable|image|max:4096',
            'onshoring_title'       => 'required|string|max:100',
            'onshoring_description' => 'required|string|max:2000',
            'onshoring_image1'      => 'nullable|image|max:4096',
            'onshoring_image2'      => 'nullable|image|max:4096',
            'onshoring_image3'      => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('nearshoring', 'ventajas') ?? abort(404);
        $content = $section->content ?? [];

        $content['badge_text']            = $request->badge_text;
        $content['title']                 = $request->title;
        $content['description']           = $request->description;
        $content['repse_text']            = $request->repse_text;
        $content['onshoring_title']       = $request->onshoring_title;
        $content['onshoring_description'] = $request->onshoring_description;

        // Handle Image uploads
        $imgFields = ['image', 'onshoring_image1', 'onshoring_image2', 'onshoring_image3'];
        foreach ($imgFields as $field) {
            if ($request->hasFile($field)) {
                $old = $content[$field] ?? null;
                if ($old && !str_starts_with($old, 'http')) {
                    Storage::disk('public')->delete($old);
                }
                $content[$field] = $request->file($field)->store('nearshoring/ventajas', 'public');
            }
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.nearshoring.ventajas.edit')
            ->with('success', 'Ventajas competitivas de Nearshoring actualizadas correctamente.');
    }
}
