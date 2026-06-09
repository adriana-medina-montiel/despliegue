<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ConocenosTestimonialsSeeder extends Seeder
{
    public function run(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'conocenos', 'section_key' => 'testimonials'],
            [
                'content' => [
                    'badge_text' => 'Voces',
                    'title'      => 'Lo que dicen nuestros clientes',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $testimonials = [
                [
                    'logo_image'  => 'https://softura.com.mx/SofturaSolutions/images/grupo_Red.png',
                    'quote'       => 'Softura es sin duda un socio estratégico en el desarrollo de soluciones de software especializados. En Softura encontramos una cultura de trabajo muy similar a la nuestra, donde compartimos el compromiso para lograr los objetivos y metas de los proyectos que abordamos en conjunto. Estas similitudes las consideramos claves para el éxito que hemos logrado colaborando en estos últimos dos años.',
                    'author_name' => 'Emeterio Flores Landaverde',
                    'author_role' => 'Director de operaciones y proyectos especiales (Abril-2020)',
                ],
                [
                    'logo_image'  => 'https://softura.com.mx/SofturaSolutions/images/dentalia.png',
                    'quote'       => 'Conozco a la empresa Softura desde hace 6 años en los cuáles siempre he encontrado seriedad, compromiso, respaldo y garantía en cada uno de los proyectos y servicios que he contratado: Desarrollo de Sistemas en diferentes plataformas y lenguajes, Asesoría para implementar herramientas y metodología en las áreas de desarrollo, QA, Producción y Sistemas de eLearning.',
                    'author_name' => 'Eliud Arista González',
                    'author_role' => 'Subdirector de TI en la empresa dentalia (Abril-2020)',
                ],
            ];

            foreach ($testimonials as $i => $t) {
                $section->items()->create(['sort_order' => $i, 'data' => $t]);
            }
        }
    }
}
