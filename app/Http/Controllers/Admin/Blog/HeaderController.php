<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('blog', 'header') ?? abort(404);
        return view('admin.blog.header', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text' => 'required|string|max:80',
            'title'      => 'required|string|max:255',
        ]);

        $section = PageSection::get('blog', 'header') ?? abort(404);

        $section->update([
            'content' => [
                'badge_text' => $request->badge_text,
                'title'      => $request->title,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.blog.header.edit')
            ->with('success', 'Cabecera del blog actualizada correctamente.');
    }
}
