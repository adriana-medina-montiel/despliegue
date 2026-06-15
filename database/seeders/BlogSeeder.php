<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        PageSection::firstOrCreate(
            ['page_slug' => 'blog', 'section_key' => 'header'],
            [
                'content' => [
                    'badge_text' => 'Blog',
                    'title'      => 'Insights & Tecnología',
                ],
                'is_visible' => true,
            ]
        );

        $posts = PageSection::firstOrCreate(
            ['page_slug' => 'blog', 'section_key' => 'posts'],
            [
                'content' => ['title' => 'Publicaciones'],
                'is_visible' => true,
            ]
        );

        if ($posts->items()->count() === 0) {
            $entries = [
                ['title' => '¿Es Python el lenguaje del futuro?', 'date' => '11/11/2020', 'author' => 'Omar Hernández', 'excerpt' => 'El lenguaje Python surgió a principios de los 90 y fue diseñado para...', 'image' => 'img/blog/python.jpg', 'categories' => ''],
                ['title' => 'Diferencias entre mesa de mezclas analógica y digital', 'date' => '10/11/2020', 'author' => 'Raymundo Polo', 'excerpt' => 'Las consolas mezcladoras de audio funcionan ya sea con tecnología análoga...', 'image' => 'img/blog/mezcladora.jpg', 'categories' => ''],
                ['title' => 'Cifrado de datos.', 'date' => '09/11/2020', 'author' => 'Victor Hugo Tamayo', 'excerpt' => '¿Cómo se asegura la privacidad de la información?', 'image' => 'img/blog/cifrado.jpg', 'categories' => ''],
                ['title' => 'Objetos de aprendizaje.', 'date' => '06/11/2020', 'author' => 'Sergey Sánchez', 'excerpt' => 'Un objeto de aprendizaje (OA) es una unidad de contenido mínima...', 'image' => 'img/blog/objetos.jpg', 'categories' => 'Tecnología, Educación, Multimedia'],
                ['title' => 'Copiar y Pegar', 'date' => '29/10/2020', 'author' => 'Irvin Lopez', 'excerpt' => 'Aunque no tengas altos conocimientos informáticos, es muy probable que...', 'image' => 'img/blog/virus.jpg', 'categories' => 'Tecnología, Educación, Multimedia'],
                ['title' => 'Motores y Operadores de búsqueda', 'date' => '23/10/2020', 'author' => 'Enrique Corona', 'excerpt' => 'Como sabemos, el internet es una conexión de miles incluso millones de conexiones...', 'image' => 'img/blog/bigdata.jpg', 'categories' => 'Buscadores, Web, Busquedas'],
                ['title' => 'Apps y páginas para aprender más.', 'date' => '21/10/2020', 'author' => 'Uriel Alvarez', 'excerpt' => 'En esta cuarentena, ¿estas aburrido?, invierte tu tiempo en cosas grandiosas...', 'image' => 'img/blog/bigdata.jpg', 'categories' => 'Apps, Aprender, En casa'],
                ['title' => 'El impacto del COVID-19 en las MiPyMEs.', 'date' => '20/10/2020', 'author' => 'Guillermo Alvarez', 'excerpt' => 'Es indiscutible que el mundo ha cambiado desde que apareció el COVID-19...', 'image' => 'img/blog/bigdata.jpg', 'categories' => 'MiPyMEs, COVID-19'],
                ['title' => '¿Qué es Arduino?', 'date' => '14/10/2020', 'author' => 'Caleb Hernandez', 'excerpt' => 'Arduino es una placa programable que se utiliza normalmente en proyectos...', 'image' => 'img/blog/bigdata.jpg', 'categories' => 'Tecnología'],
                ['title' => 'E-learning', 'date' => '13/10/2020', 'author' => 'Juan Marcos Muñoz', 'excerpt' => 'E-learning es un término abreviado en inglés para "electronic learning"...', 'image' => 'img/blog/bigdata.jpg', 'categories' => 'Tecnología, Informacion'],
                ['title' => 'Importancia de la programación.', 'date' => '12/10/2020', 'author' => 'Amilcar Sosa', 'excerpt' => 'En el ámbito de la informática, la programación refiere a la acción de...', 'image' => 'img/blog/bigdata.jpg', 'categories' => 'Tecnología'],
                ['title' => 'El internet es más viejo', 'date' => '11/10/2020', 'author' => 'Carlos Rodríguez', 'excerpt' => 'El internet tiene más de 30 años y ha evolucionado enormemente desde sus inicios...', 'image' => 'img/blog/bigdata.jpg', 'categories' => ''],
            ];

            foreach ($entries as $i => $entry) {
                $posts->items()->create([
                    'sort_order' => $i,
                    'data' => $entry,
                ]);
            }
        }
    }
}
