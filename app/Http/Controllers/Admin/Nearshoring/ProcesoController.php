<?php

namespace App\Http\Controllers\Admin\Nearshoring;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcesoController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('nearshoring', 'proceso') ?? abort(404);
        return view('admin.nearshoring.proceso', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nearshoring_title'       => 'required|string|max:100',
            'nearshoring_description' => 'required|string|max:2000',
            'nearshoring_image'       => 'nullable|image|max:4096',
            'staffing_title'          => 'required|string|max:100',
            'staffing_bullets'        => 'required|string|max:1000',
            'outsourcing_title'       => 'required|string|max:100',
            'outsourcing_bullets'     => 'required|string|max:1000',
            'support_title'           => 'required|string|max:100',
            'support_lead'            => 'required|string|max:255',
            'support_description'     => 'required|string|max:1000',
            'support_image'           => 'nullable|image|max:4096',
        ]);

        $section = PageSection::get('nearshoring', 'proceso') ?? abort(404);
        $content = $section->content ?? [];

        $content['nearshoring_title']       = $request->nearshoring_title;
        $content['nearshoring_description'] = $request->nearshoring_description;
        $content['staffing_title']          = $request->staffing_title;
        $content['staffing_bullets']        = $request->staffing_bullets;
        $content['outsourcing_title']       = $request->outsourcing_title;
        $content['outsourcing_bullets']     = $request->outsourcing_bullets;
        $content['support_title']           = $request->support_title;
        $content['support_lead']            = $request->support_lead;
        $content['support_description']     = $request->support_description;

        // Handle Image uploads
        $imgFields = ['nearshoring_image', 'support_image'];
        foreach ($imgFields as $field) {
            if ($request->hasFile($field)) {
                $old = $content[$field] ?? null;
                if ($old && !str_starts_with($old, 'http')) {
                    Storage::disk('public')->delete($old);
                }
                $content[$field] = $request->file($field)->store('nearshoring/proceso', 'public');
            }
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.nearshoring.proceso.edit')
            ->with('success', 'Proceso y soporte de Nearshoring actualizados correctamente.');
    }
}
