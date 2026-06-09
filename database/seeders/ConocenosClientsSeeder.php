<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ConocenosClientsSeeder extends Seeder
{
    public function run(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'conocenos', 'section_key' => 'clients'],
            [
                'content' => [
                    'badge_text'  => 'Confianza',
                    'title'       => 'Ellos nos avalan',
                    'description' => 'Relaciones comerciales basadas en la confianza, en cualquier giro y modelo de negocio.',
                    'sectors'     => [
                        ['name' => 'Gobierno',  'tag' => 'Sector gobierno'],
                        ['name' => 'Educativo', 'tag' => 'Sector educativo'],
                        ['name' => "TIC's",     'tag' => "Sector TIC's"],
                        ['name' => 'Privado',   'tag' => 'Iniciativa privada'],
                    ],
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $logos = [
                ['sector' => 0, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/indesol.png',        'alt' => 'Indesol'],
                ['sector' => 0, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/dgcft.png',           'alt' => 'DGCFT'],
                ['sector' => 0, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/oportunidades-ch.png','alt' => 'Oportunidades'],
                ['sector' => 0, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/sedesol.png',         'alt' => 'SEDESOL'],
                ['sector' => 0, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/prospera.png',        'alt' => 'PROSPERA'],
                ['sector' => 1, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/ipn.png',             'alt' => 'IPN'],
                ['sector' => 1, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/uat2.png',            'alt' => 'UAT'],
                ['sector' => 1, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/itsc-ch.png',         'alt' => 'ITSC'],
                ['sector' => 1, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/iesm.png',            'alt' => 'IESM'],
                ['sector' => 2, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/grupo_Red.png',       'alt' => 'GrupoRed'],
                ['sector' => 2, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/core_one.png',        'alt' => 'Core One'],
                ['sector' => 2, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/clusted.png',         'alt' => 'CLUSTEC'],
                ['sector' => 3, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/Omnilife-ch.png',     'alt' => 'Omnilife'],
                ['sector' => 3, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/dentalia.png',        'alt' => 'Dentalia'],
                ['sector' => 3, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/deloitte.png',        'alt' => 'Deloitte'],
                ['sector' => 3, 'image' => 'https://softura.com.mx/SofturaSolutions/images/clientes/metalsa.png',         'alt' => 'Metalsa'],
            ];

            foreach ($logos as $i => $logo) {
                $section->items()->create(['sort_order' => $i, 'data' => $logo]);
            }
        }
    }
}
