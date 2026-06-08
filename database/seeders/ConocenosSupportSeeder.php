<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ConocenosSupportSeeder extends Seeder
{
    public function run(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'conocenos', 'section_key' => 'support'],
            [
                'content' => [
                    'badge_text'  => 'Soporte 360°',
                    'title'       => '¡Te acompañamos en todo momento!',
                    'description' => 'Aliado de negocio a largo plazo: soporte técnico y creativo antes, durante y después de cada proyecto.',
                    'side_image'  => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/image5.png',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $steps = [
                ['phase_title' => 'Antes del proyecto',    'phase_description' => 'Consultoría y definición de alcance'],
                ['phase_title' => 'Durante el desarrollo', 'phase_description' => 'Seguimiento y comunicación constante'],
                ['phase_title' => 'Después de la entrega', 'phase_description' => 'Soporte, evolución y mejora continua'],
            ];

            foreach ($steps as $i => $step) {
                $section->items()->create(['sort_order' => $i, 'data' => $step]);
            }
        }
    }
}
