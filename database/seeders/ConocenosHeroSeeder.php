<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ConocenosHeroSeeder extends Seeder
{
    public function run(): void
    {
        PageSection::firstOrCreate(
            ['page_slug' => 'conocenos', 'section_key' => 'hero'],
            [
                'content' => [
                    'badge_text'       => 'Quiénes somos',
                    'title'            => 'Queremos ser tu aliado de negocio',
                    'description'      => 'Soluciones de software a la medida con consultoría, calidad y acompañamiento en cada etapa de tu proyecto.',
                    'background_image' => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/image67.png',
                ],
                'is_visible' => true,
            ]
        );
    }
}
