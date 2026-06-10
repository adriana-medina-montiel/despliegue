<?php

namespace App\Http\Controllers\Admin\Productos;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function edit()
    {
        // We list the 7 detailed sections to edit
        $sections = [
            'bituyu'      => ['name' => 'Bituyú', 'desc' => 'Red virtual de negocios y tiendas digitales para MiPyMEs.'],
            'binibiaa'    => ['name' => 'Binibiaa', 'desc' => 'Sistema de gestión cultural y administrativa.'],
            'academika'   => ['name' => 'Academika', 'desc' => 'Plataforma académica integral para instituciones.'],
            'siga'        => ['name' => 'SIGA', 'desc' => 'Sistema de información para la gestión académica.'],
            'fenix_admin' => ['name' => 'Fenyx Admin', 'desc' => 'Administración empresarial ágil y eficiente.'],
            'mipbr'       => ['name' => 'MI PBR', 'desc' => 'Monitoreo y control de indicadores y proyectos.'],
            'sspip'       => ['name' => 'SSPIP', 'desc' => 'Sistema especializado para procesos y operaciones.'],
        ];

        return view('admin.productos.products_list', compact('sections'));
    }

    public function editItem($key)
    {
        $section = PageSection::get('productos', $key) ?? abort(404);
        return view('admin.productos.product_edit', compact('section', 'key'));
    }

    public function updateItem(Request $request, $key)
    {
        $section = PageSection::get('productos', $key) ?? abort(404);
        $content = $section->content ?? [];

        // Simple validation
        $request->validate([
            'title'        => 'nullable|string|max:255',
            'subtitle'     => 'nullable|string|max:255',
            'description'  => 'nullable|string|max:2000',
            'slogan'       => 'nullable|string|max:255',
            'tagline'      => 'nullable|string|max:255',
            'bar_text'     => 'nullable|string|max:500',
            'cta_text'     => 'nullable|string|max:100',
            'cta_url'      => 'nullable|string|max:255',
            'main_heading' => 'nullable|string|max:255',
            'subheading'   => 'nullable|string|max:255',
            'footer_text'  => 'nullable|string|max:255',
        ]);

        // General simple fields
        $fields = [
            'title', 'subtitle', 'description', 'slogan', 'tagline', 'bar_text', 
            'cta_text', 'cta_url', 'main_heading', 'subheading', 'footer_text',
            'google_play_url', 'app_store_url', 'mlibre_url', 'etsy_url', 
            'marketplace_title', 'badge', 'badge_text', 'objective_heading', 'objective_description', 'widget_icon'
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $content[$field] = $request->input($field);
            }
        }

        // File uploads
        $fileFields = ['mascot_image', 'eco_diagram_image', 'laptop_image', 'image'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $old = $content[$field] ?? null;
                if ($old && !str_starts_with($old, 'http')) {
                    Storage::disk('public')->delete($old);
                }
                $content[$field] = $request->file($field)->store('productos/' . $key, 'public');
            }
        }

        // --- Custom content based on product ---

        // 1. Bituyú stats & features
        if ($key === 'bituyu') {
            if ($request->has('stat_value')) {
                $stats = [];
                $sValues = $request->input('stat_value', []);
                $sLabels = $request->input('stat_label', []);
                $sIcons  = $request->input('stat_icon', []);
                foreach ($sValues as $i => $val) {
                    $stats[] = [
                        'value' => $val,
                        'label' => $sLabels[$i] ?? '',
                        'icon'  => $sIcons[$i] ?? 'fas fa-store'
                    ];
                }
                $content['stats'] = $stats;
            }

            if ($request->has('feature_title')) {
                $features = [];
                $fTitles = $request->input('feature_title', []);
                $fDescs  = $request->input('feature_desc', []);
                $fIcons  = $request->input('feature_icon', []);
                $fInners = $request->input('feature_inner_icon', []);
                foreach ($fTitles as $i => $ftitle) {
                    $features[] = [
                        'title'       => $ftitle,
                        'description' => $fDescs[$i] ?? '',
                        'icon'        => $fIcons[$i] ?? 'icon-store',
                        'inner_icon'  => $fInners[$i] ?? 'fas fa-store'
                    ];
                }
                $content['features'] = $features;
            }
        }

        // 2. Binibiaa Showcase Items
        if ($key === 'binibiaa') {
            if ($request->has('item_title')) {
                $items = [];
                $iTitles = $request->input('item_title', []);
                $iDescs  = $request->input('item_desc', []);
                $iBadges = $request->input('item_badge', []);
                $iExists = $request->input('item_existing_image', []);
                $iFiles  = $request->file('item_image_new', []);

                foreach ($iTitles as $i => $ititle) {
                    $img = $iExists[$i] ?? '';
                    if (isset($iFiles[$i]) && $iFiles[$i]->isValid()) {
                        if ($img && !str_starts_with($img, 'http')) {
                            Storage::disk('public')->delete($img);
                        }
                        $img = $iFiles[$i]->store('productos/binibiaa', 'public');
                    }
                    $items[] = [
                        'title'       => $ititle,
                        'description' => $iDescs[$i] ?? '',
                        'badge'       => $iBadges[$i] ?? '',
                        'image'       => $img
                    ];
                }
                $content['items'] = $items;
            }
        }

        // 3. Academika Modules & features
        if ($key === 'academika') {
            if ($request->has('mod_title')) {
                $modules = [];
                $mTitles = $request->input('mod_title', []);
                $mDescs  = $request->input('mod_desc', []);
                $mIcons  = $request->input('mod_icon', []);
                $mColors = $request->input('mod_color', []);
                foreach ($mTitles as $i => $mtitle) {
                    $modules[] = [
                        'title'       => $mtitle,
                        'description' => $mDescs[$i] ?? '',
                        'icon'        => $mIcons[$i] ?? 'fas fa-book-open',
                        'color'       => $mColors[$i] ?? 'bg-blue-soft'
                    ];
                }
                $content['modules'] = $modules;
            }

            if ($request->has('feat_text')) {
                $features = [];
                $feTexts = $request->input('feat_text', []);
                $feIcons = $request->input('feat_icon', []);
                foreach ($feTexts as $i => $ftext) {
                    $features[] = [
                        'text' => $ftext,
                        'icon' => $feIcons[$i] ?? 'fas fa-database'
                    ];
                }
                $content['features'] = $features;
            }
        }

        // 4. SIGA Features
        if ($key === 'siga') {
            if ($request->has('feat_title')) {
                $features = [];
                $fTitles = $request->input('feat_title', []);
                $fIcons  = $request->input('feat_icon', []);
                $fColors = $request->input('feat_color', []);
                foreach ($fTitles as $i => $ftitle) {
                    $features[] = [
                        'title' => $ftitle,
                        'icon'  => $fIcons[$i] ?? 'fas fa-file-alt',
                        'color' => $fColors[$i] ?? 'ico-blue'
                    ];
                }
                $content['features'] = $features;
            }
        }

        // 5. Fenyx Admin nodes
        if ($key === 'fenix_admin') {
            if ($request->has('node_title')) {
                $nodes = [];
                $nTitles = $request->input('node_title', []);
                $nDescs  = $request->input('node_desc', []);
                $nIcons  = $request->input('node_icon', []);
                $nClasses = $request->input('node_class', []);
                $nIcoCls  = $request->input('node_icon_class', []);
                foreach ($nTitles as $i => $ntitle) {
                    $nodes[] = [
                        'title'       => $ntitle,
                        'description' => $nDescs[$i] ?? '',
                        'icon'        => $nIcons[$i] ?? 'fas fa-shopping-cart',
                        'class'       => $nClasses[$i] ?? 'node-compras',
                        'icon_class'  => $nIcoCls[$i] ?? 'icon-blue'
                    ];
                }
                $content['nodes'] = $nodes;
            }
        }

        // 6. MI PBR benefits
        if ($key === 'mipbr') {
            if ($request->has('benefit_text')) {
                $benefits = [];
                $bTexts = $request->input('benefit_text', []);
                foreach ($bTexts as $i => $btext) {
                    $benefits[] = [
                        'text' => $btext
                    ];
                }
                $content['benefits'] = $benefits;
            }
        }

        // 7. SSPIP timeline
        if ($key === 'sspip') {
            if ($request->has('tl_text')) {
                $timeline = [];
                $tlTexts = $request->input('tl_text', []);
                $tlIcons = $request->input('tl_icon', []);
                $tlNums  = $request->input('tl_number', []);
                foreach ($tlTexts as $i => $ttext) {
                    $timeline[] = [
                        'text'   => $ttext,
                        'icon'   => $tlIcons[$i] ?? 'fas fa-chart-line',
                        'number' => $tlNums[$i] ?? sprintf('%02d', $i + 1)
                    ];
                }
                $content['timeline'] = $timeline;
            }
        }

        $section->update([
            'content'    => $content,
            'is_visible' => $request->boolean('is_visible'),
        ]);

        return redirect()->route('admin.productos.servicios.editItem', $key)
            ->with('success', 'Producto ' . $key . ' actualizado correctamente.');
    }
}
