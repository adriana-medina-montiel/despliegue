<?php

namespace App\Http\Controllers\Admin\Fabrica;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class ServicesOverviewController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('fabrica', 'services_overview') ?? abort(404);
        return view('admin.fabrica.services_overview', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tag'   => 'required|string|max:100',
            'title' => 'required|string|max:255',
        ]);

        $section = PageSection::get('fabrica', 'services_overview') ?? abort(404);
        $content = $section->content ?? [];

        $content['tag']   = $request->tag;
        $content['title'] = $request->title;

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.fabrica.services_overview.edit')
            ->with('success', 'Introducción de servicios actualizada correctamente.');
    }
}
