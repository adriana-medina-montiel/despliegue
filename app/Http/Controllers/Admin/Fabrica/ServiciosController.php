<?php

namespace App\Http\Controllers\Admin\Fabrica;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Models\SectionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiciosController extends Controller
{
    public function edit()
    {
        $section = PageSection::get('fabrica', 'servicios') ?? abort(404);
        $items = $section->items;
        return view('admin.fabrica.servicios_list', compact('section', 'items'));
    }

    public function editItem($id)
    {
        $item = SectionItem::findOrFail($id);
        return view('admin.fabrica.servicio_edit', compact('item'));
    }

    public function updateItem(Request $request, $id)
    {
        $item = SectionItem::findOrFail($id);
        $data = $item->data ?? [];

        $request->validate([
            'title' => 'required|string|max:255',
            'text'  => 'required|string|max:1000',
            'image' => 'nullable|image|max:4096',
        ]);

        $data['title'] = $request->title;
        $data['text']  = $request->text;
        $data['repse'] = $request->boolean('repse');

        // Main service image
        if ($request->hasFile('image')) {
            $old = $data['image'] ?? null;
            if ($old && !str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            $data['image'] = $request->file('image')
                ->store('fabrica/servicios', 'public');
        }

        // Bullets
        $bullets = $request->input('bullets', []);
        $data['bullets'] = array_filter(array_map('trim', $bullets));

        // Tech Logos
        $logos = [];
        $logoNames = $request->input('logo_name', []);
        $logoExisting = $request->input('logo_existing', []);
        $logoCdns = $request->input('logo_cdn', []);
        $logoFiles = $request->file('logo_file_new', []);

        foreach ($logoNames as $i => $name) {
            $file = $logoExisting[$i] ?? '';
            if (isset($logoFiles[$i]) && $logoFiles[$i]->isValid()) {
                if ($file && !str_starts_with($file, 'http')) {
                    Storage::disk('public')->delete($file);
                }
                $file = $logoFiles[$i]->store('fabrica/tech', 'public');
            }

            $logos[] = [
                'name' => $name,
                'file' => $file,
                'cdn'  => $logoCdns[$i] ?? '',
            ];
        }
        $data['logos'] = $logos;

        // Cloud services (if applicable)
        if ($request->has('cloud_name')) {
            $cloudServices = [];
            $cloudNames = $request->input('cloud_name', []);
            $cloudLogosExisting = $request->input('cloud_logo_existing', []);
            $cloudLogosNew = $request->file('cloud_logo_new', []);
            $cloudItems = $request->input('cloud_items', []);

            foreach ($cloudNames as $i => $cname) {
                $clogo = $cloudLogosExisting[$i] ?? '';
                if (isset($cloudLogosNew[$i]) && $cloudLogosNew[$i]->isValid()) {
                    if ($clogo && !str_starts_with($clogo, 'http')) {
                        Storage::disk('public')->delete($clogo);
                    }
                    $clogo = $cloudLogosNew[$i]->store('fabrica/cloud', 'public');
                }

                $citemsStr = $cloudItems[$i] ?? '';
                $citemsArr = array_filter(array_map('trim', explode(',', $citemsStr)));

                $cloudServices[] = [
                    'nombre' => $cname,
                    'logo'   => $clogo,
                    'items'  => $citemsArr,
                ];
            }
            $data['cloud_servicios'] = $cloudServices;
        }

        $item->update(['data' => $data]);

        return redirect()->route('admin.fabrica.servicios.editItem', $id)
            ->with('success', 'Servicio actualizado correctamente.');
    }
}
