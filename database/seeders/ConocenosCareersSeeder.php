<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ConocenosCareersSeeder extends Seeder
{
    public function run(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'conocenos', 'section_key' => 'careers'],
            [
                'content' => [
                    'badge_text'  => 'Carreras',
                    'title'       => 'Buscamos talento',
                    'description' => '¿Te gustaría construir tecnología con nosotros? Cuéntanos sobre ti.',
                    'email'       => 'info@softura.com.mx',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $perks = [
                'Proyectos retadores',
                'Crecimiento profesional',
                'Cultura colaborativa',
            ];

            foreach ($perks as $i => $perk) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data' => ['label' => $perk],
                ]);
            }
        }
    }
}
