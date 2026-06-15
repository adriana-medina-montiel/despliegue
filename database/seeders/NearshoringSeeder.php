<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class NearshoringSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Hero
        PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'hero'],
            [
                'content' => [
                    'badge_text'  => 'Servicios',
                    'title'       => 'Nearshoring &amp; <span>Onshoring</span>',
                    'description' => 'Con nuestros modelos de externalización, seremos tus verdaderos aliados de negocio. Deja de preocuparte por los costos de reclutamiento, selección, capacitación y continuidad del personal.',
                ],
                'is_visible' => true,
            ]
        );

        // 2. Propuesta de Valor (Process cards)
        $propuesta = PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'propuesta_valor'],
            [
                'content' => [
                    'description' => 'Hagamos equipo y <strong>deja de preocuparte</strong> de los costos de reclutamiento, selección, capacitación y continuidad del personal.',
                    'cta_text'    => 'Hablemos de tu proyecto',
                    'cta_url'     => '/contacto',
                ],
                'is_visible' => true,
            ]
        );

        if ($propuesta->items()->count() === 0) {
            $cards = [
                [
                    'title'       => 'Nearshoring',
                    'icon'        => 'fas fa-globe-americas',
                    'description' => 'Nuestros ingenieros trabajan remotamente en proyectos para tu empresa ubicada en E.U.A. o Latinoamérica, con zona horaria compatible y comunicación en tiempo real.',
                ],
                [
                    'title'       => 'Onshoring',
                    'icon'        => 'fas fa-map-marker-alt',
                    'description' => 'Nuestros ingenieros trabajan directamente en tus instalaciones ubicadas en México cuando así se requiera, integrándose a tu equipo local.',
                ],
            ];

            foreach ($cards as $i => $card) {
                $propuesta->items()->create([
                    'sort_order' => $i,
                    'data' => $card,
                ]);
            }
        }

        // 3. Ventajas Competitivas
        PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'ventajas'],
            [
                'content' => [
                    'badge_text'            => 'Onshoring',
                    'title'                 => 'Células especializadas',
                    'description'           => 'En esta modalidad, tu empresa nos transfiere las responsabilidades referentes al cumplimiento de tareas relacionadas con el desarrollo de software. No necesitas crecer tu nómina.',
                    'repse_text'            => 'Pertenecemos al padrón del <strong>REPSE</strong>, obligatorio de la STPS para regular a las empresas que ofrecen servicios especializados.',
                    'image'                 => 'img/official/productos/onshoring.jpg',
                    'onshoring_title'       => 'ONSHORING',
                    'onshoring_description' => 'En esta modalidad, tu empresa nos transfiere las responsabilidades referentes al cumplimiento de tareas relacionadas con el desarrollo de software. No necesitas crecer tu nómina. Contamos con células especializadas para comenzar. Pertenecemos al padrón del <strong>REPSE</strong> (Registro de Prestadoras de Servicios Especializados u Obras Especializadas), obligatorio de la STPS para regular a las empresas que ofrecen servicios especializados.',
                    'onshoring_image1'      => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&h=400&auto=format&fit=crop',
                    'onshoring_image2'      => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=400&h=400&auto=format&fit=crop',
                    'onshoring_image3'      => 'img/official/productos/onshoring.jpg',
                ],
                'is_visible' => true,
            ]
        );

        // 4. Proceso de Trabajo / Acompañamiento
        PageSection::firstOrCreate(
            ['page_slug' => 'nearshoring', 'section_key' => 'proceso'],
            [
                'content' => [
                    'nearshoring_title'       => 'NEARSHORING',
                    'nearshoring_description' => 'Con este modelo de externalización de servicios, brindamos una solución integral a empresas establecidas en el extranjero (E.U.A. y Latinoamérica). A diferencia del onshoring, esta modalidad se enfoca únicamente en el desarrollo de software de manera remota, pensando en quienes no cuenten con un equipo de TI dedicado al desarrollo dentro de su empresa.',
                    'nearshoring_image'       => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&h=600&auto=format&fit=crop',
                    'staffing_title'          => 'Servicios de Onshoring:',
                    'staffing_bullets'        => "Desarrollo e internacionalización de proyectos.\nDigitalización y alcance en toda Latinoamérica.",
                    'outsourcing_title'       => 'Servicios de Outsourcing / Staffing:',
                    'outsourcing_bullets'     => "Desarrollo de software y soluciones logísticas.\nOptimización y vitalización de infraestructura TI.",
                    'support_title'           => 'TE ACOMPAÑAMOS EN TODO MOMENTO',
                    'support_lead'            => 'Más que un proveedor, somos tu aliado tecnológico a largo plazo.',
                    'support_description'     => 'Te acompañamos antes, durante y después de cada proyecto, brindando soporte técnico y creatividad para asegurar que tus soluciones evolucionen, generen valor y sigan impulsando el crecimiento de tu negocio.',
                    'support_image'           => 'img/official/Conocenos/image5.png',
                ],
                'is_visible' => true,
            ]
        );
    }
}
