<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class InicioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Hero & stats
        $hero = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'hero'],
            [
                'content' => [
                    'badge_text'       => 'Softura Solutions',
                    'title'            => 'Software<br><em>a la</em><br>medida',
                    'description'      => 'Impulsamos la evolución de tu empresa con tecnología de alto rendimiento diseñada para el mercado actual.',
                    'background_image' => 'img/official/Conocenos/software.jpg',
                    'use_image'        => false,
                    'cta1_text'        => 'Conoce nuestros servicios',
                    'cta1_url'         => '#servicios',
                    'cta2_text'        => 'Ver más',
                    'cta2_url'         => '/conocenos',
                ],
                'is_visible' => true,
            ]
        );

        if ($hero->items()->count() === 0) {
            $stats = [
                ['value' => '20+', 'label' => 'Años de experiencia', 'color' => 'blue', 'icon' => 'calendar-alt'],
                ['value' => '30+', 'label' => 'Profesionales especializados', 'color' => 'green', 'icon' => 'users'],
                ['value' => '100+', 'label' => 'Ingenieros aliados CLUSTEC', 'color' => 'orange', 'icon' => 'globe'],
                ['value' => '7', 'label' => 'Servicios especializados', 'color' => 'purple', 'icon' => 'shield-alt'],
            ];

            foreach ($stats as $i => $stat) {
                $hero->items()->create([
                    'sort_order' => $i,
                    'data' => $stat,
                ]);
            }
        }

        // 2. Nosotros (Somos diferentes)
        PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'nosotros'],
            [
                'content' => [
                    'badge_text'  => 'Somos diferentes',
                    'title'       => '20 años impulsando la innovación',
                    'description' => 'Contamos con la experiencia y el compromiso necesarios para impulsar la innovación y el crecimiento de nuestros clientes, adaptándonos a las necesidades del mercado actual con soluciones tecnológicas de alto valor. Somos diferentes: más de 20 años impulsando la innovación.',
                    'image'       => 'img/official/Conocenos/equipo.png',
                ],
                'is_visible' => true,
            ]
        );

        // 3. Services intro header
        PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'services_intro'],
            [
                'content' => [
                    'badge_text'  => 'Fábrica de software',
                    'title'       => 'Descubre cómo podemos <span>ayudarte</span>',
                    'description' => 'Soluciones integrales de desarrollo, consultoría y acompañamiento para llevar tu negocio al siguiente nivel.',
                ],
                'is_visible' => true,
            ]
        );

        // 4. CTA / Contacto quick block
        PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'cta'],
            [
                'content' => [
                    'badge_text'  => 'Contacto',
                    'title'       => 'Emprende este <br>viaje <span>con nosotros</span>',
                    'description' => 'Cuéntanos tu idea y construyamos juntos soluciones tecnológicas que impulsen tu negocio.',
                ],
                'is_visible' => true,
            ]
        );
    }
}
