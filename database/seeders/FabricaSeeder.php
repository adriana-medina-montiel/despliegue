<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class FabricaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Hero
        PageSection::firstOrCreate(
            ['page_slug' => 'fabrica', 'section_key' => 'hero'],
            [
                'content' => [
                    'badge_text'       => '20 Aniversario',
                    'tag'              => 'Fábrica de software',
                    'title'            => 'Software <em>a la medida</em>',
                    'description'      => 'Ayudamos a las empresas a crecer y consolidarse mediante soluciones de software a la medida, respaldadas por consultoría especializada que garantiza que cada desarrollo responda realmente a las necesidades y objetivos del negocio.',
                    'background_image' => 'img/official/productos/tecnologia.jpg',
                    'cta1_text'        => 'Descubre nuestros servicios',
                    'cta1_url'         => '#servicios-overview',
                    'cta2_text'        => 'Agenda una reunión',
                    'cta2_url'         => '/contacto',
                ],
                'is_visible' => true,
            ]
        );

        // 2. Services Overview Intro
        PageSection::firstOrCreate(
            ['page_slug' => 'fabrica', 'section_key' => 'services_overview'],
            [
                'content' => [
                    'tag'   => 'Fábrica de software',
                    'title' => 'Descubre cómo podemos ayudarte',
                ],
                'is_visible' => true,
            ]
        );

        // 3. Detailed Services Section
        $serviciosSec = PageSection::firstOrCreate(
            ['page_slug' => 'fabrica', 'section_key' => 'servicios'],
            [
                'content' => [
                    'title' => 'Nuestros Servicios',
                ],
                'is_visible' => true,
            ]
        );

        if ($serviciosSec->items()->count() === 0) {
            $configServices = config('softura-content.servicios', []);
            foreach ($configServices as $i => $svc) {
                $serviciosSec->items()->create([
                    'sort_order' => $i,
                    'data' => [
                        'title'           => $svc['titulo'],
                        'text'            => $svc['texto'],
                        'image'           => $svc['imagen'] ?? '',
                        'bullets'         => $svc['bullets'] ?? [],
                        'logos'           => $svc['logos'] ?? [],
                        'repse'           => $svc['repse'] ?? false,
                        'cloud_servicios' => $svc['cloud_servicios'] ?? [],
                    ],
                ]);
            }
        }

        // 4. Closing Band CTA
        PageSection::firstOrCreate(
            ['page_slug' => 'fabrica', 'section_key' => 'band'],
            [
                'content' => [
                    'title'     => 'El software ha cambiado el mundo',
                    'lead'      => '<strong>Imagínate lo que hará por ti...</strong>',
                    'image'     => 'img/official/Conocenos/software.jpg',
                    'cta_text'  => 'Iniciar un proyecto',
                    'cta_url'   => '/contacto',
                ],
                'is_visible' => true,
            ]
        );
    }
}
