<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ConocenosDifferentiatorsSeeder extends Seeder
{
    public function run(): void
    {
        PageSection::firstOrCreate(
            ['page_slug' => 'conocenos', 'section_key' => 'differentiators'],
            [
                'content' => [
                    'badge_text'          => 'Por qué elegirnos',
                    'title'               => '¡Te brindamos más que los demás!',
                    'header_description'  => 'Complementamos el servicio de software con diferenciadores que hacen única cada colaboración con tu empresa.',
                    'medal_image'         => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/images.png',
                    'body_text'           => 'En Softura Solutions nos esforzamos por brindarte la mejor experiencia. Complementamos el desarrollo de software con diferenciadores clave para que tu experiencia con nosotros sea única.',
                    'diagram_image'       => 'https://softura.com.mx/SofturaSolutions/images/Conocenos/detalles.png',
                    'diagram_caption'     => 'Los detalles de valor',
                ],
                'is_visible' => true,
            ]
        );
    }
}
