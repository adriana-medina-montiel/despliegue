<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ConocenosPillarsSeeder extends Seeder
{
    public function run(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'conocenos', 'section_key' => 'pillars'],
            [
                'content' => [
                    'title'       => 'Ayudarte a mejorar es nuestra motivación',
                    'description' => 'Nuestro equipo de profesionales está integrado por especialistas, responsables y comprometidos, mismos que se encuentran en constante actualización, con el objetivo de brindar el mejor servicio.',
                ],
                'is_visible' => true,
            ]
        );

        // Only seed items if none exist yet
        if ($section->items()->count() === 0) {
            $pillars = [
                ['label' => 'Profesionalismo',  'image' => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/ima1.png'],
                ['label' => 'Responsabilidad',  'image' => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/ima2.png'],
                ['label' => 'Compromiso',        'image' => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/ima3.png'],
                ['label' => 'Expertiz',          'image' => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/ima4.png'],
            ];

            foreach ($pillars as $i => $pillar) {
                $section->items()->create(['sort_order' => $i, 'data' => $pillar]);
            }
        }
    }
}
