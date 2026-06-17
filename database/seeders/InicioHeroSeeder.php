<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class InicioHeroSeeder extends Seeder
{
    public function run(): void
    {
        $section = PageSection::firstOrCreate(
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

        if ($section->items()->count() === 0) {
            $stats = [
                ['value' => '20+', 'label' => 'Años de experiencia', 'color' => 'blue', 'icon' => 'calendar-alt'],
                ['value' => '30+', 'label' => 'Profesionales especializados', 'color' => 'green', 'icon' => 'users'],
                ['value' => '100+', 'label' => 'Ingenieros aliados CLUSTEC', 'color' => 'orange', 'icon' => 'globe'],
                ['value' => '7', 'label' => 'Servicios especializados', 'color' => 'purple', 'icon' => 'shield-alt'],
            ];

            foreach ($stats as $i => $stat) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data' => $stat,
                ]);
            }
        }
    }
}
