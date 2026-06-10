<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('blog', 'posts') ?? abort(404);
        $items = $section->items;
        return view('admin.blog.posts', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'item_title'   => 'array',
            'item_title.*' => 'nullable|string|max:255',
        ]);

        $section = PageSection::get('blog', 'posts') ?? abort(404);
        $section->items()->delete();

        $titles    = $request->input('item_title', []);
        $dates     = $request->input('item_date', []);
        $authors   = $request->input('item_author', []);
        $excerpts  = $request->input('item_excerpt', []);
        $categories = $request->input('item_categories', []);
        $existing  = $request->input('item_existing_image', []);
        $files     = $request->file('item_image_new', []);

        foreach ($titles as $i => $title) {
            if (! trim($title)) {
                continue;
            }

            $image = $existing[$i] ?? '';
            if (isset($files[$i]) && $files[$i]->isValid()) {
                $image = $files[$i]->store('blog/posts', 'public');
            }

            $section->items()->create([
                'sort_order' => $i,
                'data' => [
                    'title'      => $title,
                    'date'       => $dates[$i] ?? '',
                    'author'     => $authors[$i] ?? '',
                    'excerpt'    => $excerpts[$i] ?? '',
                    'categories' => $categories[$i] ?? '',
                    'image'      => $image,
                ],
            ]);
        }

        $section->update(['is_visible' => $request->boolean('is_visible')]);

        return redirect()->route('admin.blog.posts.edit')
            ->with('success', 'Publicaciones del blog actualizadas correctamente.');
    }
}
