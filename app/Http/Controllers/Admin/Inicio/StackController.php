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
            'kicker'          => 'required|string|max:100',
            'title'           => 'required|string|max:255',
            'brand_name'      => 'required|string|max:100',
            'description'     => 'required|string|max:500',
            'link_text'       => 'required|string|max:100',
            'link_url'        => 'required|string|max:255',
            'website_text'    => 'nullable|string|max:100',
            'website_url'     => 'nullable|string|max:255',
            'cta_text'        => 'required|string|max:100',
            'cta_url'         => 'required|string|max:255',
            'brand_logo'      => 'nullable|image|max:2048',
            'product_image'   => 'nullable|image|max:2048',
            'item_text.*'     => 'required|string|max:150',
        ]);

        $section = PageSection::get('inicio', 'stack') ?? abort(404);
        $content = $section->content ?? [];

        $content['kicker']       = $request->kicker;
        $content['title']        = $request->title;
        $content['brand_name']   = $request->brand_name;
        $content['description']  = $request->description;
        $content['link_text']    = $request->link_text;
        $content['link_url']     = $request->link_url;
        $content['website_text'] = $request->website_text;
        $content['website_url']  = $request->website_url;
        $content['cta_text']     = $request->cta_text;
        $content['cta_url']      = $request->cta_url;
        unset($content['pill_text']);

        if ($request->hasFile('brand_logo')) {
            $old = $content['brand_logo'] ?? null;
            if ($old && !str_starts_with($old, 'http') && !str_starts_with($old, 'img/')) {
                Storage::disk('public')->delete($old);
            }
            $content['brand_logo'] = $request->file('brand_logo')->store('inicio/stack', 'public');
        }

        if ($request->hasFile('product_image')) {
            $old = $content['product_image'] ?? null;
            if ($old && !str_starts_with($old, 'http') && !str_starts_with($old, 'img/')) {
                Storage::disk('public')->delete($old);
            }
            $content['product_image'] = $request->file('product_image')->store('inicio/stack', 'public');
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();
        foreach ($request->input('item_text', []) as $i => $text) {
            if (trim($text) === '') {
                continue;
            }
            $section->items()->create([
                'sort_order' => $i,
                'data'       => ['text' => $text],
            ]);
        }

        return redirect()->route('admin.inicio.stack.edit')
            ->with('success', 'Sección Portafolio actualizada correctamente.');
    }
}
