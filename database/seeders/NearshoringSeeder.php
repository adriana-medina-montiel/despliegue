<?php
namespace Database\Seeders;
use App\Models\PageSection;
use Illuminate\Database\Seeder;

class NearshoringSeeder extends Seeder
{
    public function run(): void
    {
        PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'hero'],
            [
                'content' => [
                    'badge_text'  => 'Nearshoring',
                    'title'       => 'Potenciamos tu equipo con Nearshoring',
                    'description' => 'Conectamos talento especializado con las necesidades de tu empresa de forma ágil y eficiente.',
                    'background_image' => 'https://url-de-imagen-original',
                ],
                'is_visible' => true,
            ]
        );

        // 2. Onshoring (o el componente que sigue)
        PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'onshoring'],
            ['content' => [
                'title' => 'Nearshoring y Onshoring',
                'description' => 'La innovación para tu empresa',
                'button_text' => 'Hablemos de tu proyecto'
            ], 'is_visible' => true]
        );
    }
}