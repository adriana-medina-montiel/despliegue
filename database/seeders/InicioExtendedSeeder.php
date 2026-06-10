<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class InicioExtendedSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedDevops();
        $this->seedOnshoring();
        $this->seedCalidad();
        $this->seedValor();
        $this->seedEquipo();
        $this->seedTecnologias();
        $this->seedCapacitacion();
        $this->seedAcompanamiento();
        $this->seedEcosistema();
        $this->seedRse();
        $this->seedBituyuPreview();
        $this->seedProceso();
        $this->seedStack();
    }

    private function seedDevops(): void
    {
        $svc = collect(config('softura-content.servicios'))
            ->firstWhere('slug', 'devops');

        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'devops'],
            [
                'content' => [
                    'kicker' => 'DevOps',
                    'title'  => 'Entrega continua y confiable',
                    'lead'   => $svc['texto'] ?? 'Podemos ejecutar proyectos utilizando una filosofía para entregar software de forma más rápida, confiable y continua:',
                    'image'  => $svc['imagen'] ?? 'img/official/productos/devops.jpg',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $bullets = $svc['bullets'] ?? [
                'Integración y entrega continua',
                'Automatización de pruebas y despliegues',
                'Monitoreo y retroalimentación constante',
                'Cultura de colaboración entre equipos',
            ];

            foreach ($bullets as $i => $text) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => ['text' => $text],
                ]);
            }
        }
    }

    private function seedOnshoring(): void
    {
        $svc = collect(config('softura-content.servicios'))
            ->firstWhere('slug', 'onshoring');

        PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'onshoring'],
            [
                'content' => [
                    'kicker'      => 'Onshoring',
                    'title'       => 'Onshoring',
                    'description' => $svc['texto'] ?? 'En esta modalidad, tu empresa nos transfiere las responsabilidades referentes al cumplimiento de tareas relacionadas con el desarrollo de software. No necesitas crecer tu nómina. Contamos con células especializadas para comenzar.',
                    'repse_text'  => 'Pertenecemos al padrón del REPSE (Registro de Prestadoras de Servicios Especializados u Obras Especializadas), obligatorio de la STPS para regular a las empresas que ofrecen servicios especializados.',
                    'image'       => $svc['imagen'] ?? 'img/official/productos/onshoring.jpg',
                ],
                'is_visible' => true,
            ]
        );
    }

    private function seedCalidad(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'calidad'],
            [
                'content' => [
                    'kicker'      => 'Calidad certificada',
                    'title'       => 'La calidad es nuestra prioridad',
                    'description' => 'Desarrollamos con estándares internacionales — CMMi, PSP, MoProSoft y MAAGTICSI — combinados con metodologías ágiles y equipos certificados en Scrum.',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            foreach (config('softura-content.certificaciones', []) as $i => $cert) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => [
                        'name' => $cert['nombre'],
                        'file' => $cert['file'] ?? '',
                        'cdn'  => $cert['cdn'] ?? '',
                    ],
                ]);
            }
        }
    }

    private function seedValor(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'valor'],
            [
                'content' => [
                    'kicker'      => 'Experiencia integral',
                    'title'       => 'Mejoramos tu <span>experiencia</span>',
                    'description' => 'Brindamos una experiencia integral de servicio combinando desarrollo a la medida, buenas prácticas de ingeniería y metodologías ágiles.',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            foreach (config('softura-content.valores_experiencia', []) as $i => $valor) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => [
                        'num'   => $valor['num'],
                        'title' => $valor['titulo'],
                        'text'  => $valor['texto'],
                    ],
                ]);
            }
        }
    }

    private function seedEquipo(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'equipo'],
            [
                'content' => [
                    'kicker'      => 'Talento',
                    'title'       => 'Contamos con un equipo de <span>especialistas</span>',
                    'description' => 'Personal de ingenieros con diferentes perfiles, enfocados al desarrollo de software.',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            foreach (config('softura-content.equipo_roles', []) as $i => $rol) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => ['label' => $rol],
                ]);
            }
        }
    }

    private function seedTecnologias(): void
    {
        PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'tecnologias'],
            [
                'content' => [
                    'kicker'      => 'Stack tecnológico',
                    'title'       => 'Somos especialistas',
                    'description' => 'Nuestro equipo de profesionales está integrado por especialistas, responsables y comprometidos, mismos que se encuentran en constante actualización, con el objetivo de brindar el mejor servicio en cualquiera de las siguientes tecnologías:',
                    'quote'       => 'Nuestro principal enfoque son tecnologías de software libre',
                ],
                'is_visible' => true,
            ]
        );
    }

    private function seedCapacitacion(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'capacitacion'],
            [
                'content' => [
                    'kicker' => 'Formación continua',
                    'title'  => 'Equipo de profesionales <span>comprometidos</span>',
                    'quote'  => 'La capacitación es la llave que desbloquea el potencial de la excelencia',
                    'image'  => 'img/official/Conocenos/equipo.png',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            foreach (config('softura-content.capacitacion', []) as $i => $metric) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => [
                        'value' => $metric['valor'],
                        'text'  => $metric['texto'],
                    ],
                ]);
            }
        }
    }

    private function seedAcompanamiento(): void
    {
        PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'acompanamiento'],
            [
                'content' => [
                    'kicker'      => 'Aliado tecnológico',
                    'title'       => 'Te acompañamos en todo momento',
                    'paragraph_1' => '<strong>Más que un proveedor, somos tu aliado tecnológico a largo plazo.</strong>',
                    'paragraph_2' => 'Te acompañamos antes, durante y después de cada proyecto, brindando soporte técnico y creatividad para asegurar que tus soluciones evolucionen, generen valor y sigan impulsando el crecimiento de tu negocio.',
                    'image'       => 'img/official/Conocenos/image5.png',
                ],
                'is_visible' => true,
            ]
        );
    }

    private function seedEcosistema(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'ecosistema'],
            [
                'content' => [
                    'kicker'         => 'Red de aliados',
                    'title'          => 'Tenemos un gran <span>respaldo</span>',
                    'description'    => 'Como socios fundadores del Clúster de TI de Tlaxcala (CLUSTEC), accedemos a una red de más de 100 ingenieros expertos para proyectos de mayor escala.',
                    'highlight_text' => 'Software and Delivery Center — ampliamos capacidades con aliados estratégicos del ecosistema tecnológico nacional.',
                    'cta_text'       => 'Conoce más sobre nosotros',
                    'cta_url'        => '/conocenos',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            foreach (config('softura-content.respaldo', []) as $i => $aliado) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => [
                        'alt'  => $aliado['alt'],
                        'file' => $aliado['file'] ?? '',
                        'cdn'  => $aliado['cdn'] ?? '',
                        'text' => $aliado['texto'],
                    ],
                ]);
            }
        }
    }

    private function seedRse(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'rse'],
            [
                'content' => [
                    'kicker' => 'Responsabilidad social',
                    'title'  => 'Generadora de sinergia tecnológica con responsabilidad social',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $points = [
                ['icon' => 'handshake', 'text' => '<strong>Estrecha vinculación con IES</strong> para detectar, desarrollar y captar talento de manera temprana — estancias, estadías, prácticas profesionales — reduciendo tiempos de capacitación y fortaleciendo nuestro compromiso social.'],
                ['icon' => 'users', 'text' => 'Participamos en proyectos de <strong>Formación Dual</strong> con IES de la región para fortalecer el modelo de la Triple Hélice, incorporando talento al trabajo (ej. Jóvenes Construyendo el Futuro).'],
                ['icon' => 'book-open', 'text' => 'Fomentamos la <strong>formación continua</strong> entre nuestro personal mediante autocapacitación, certificaciones y programas educativos con IES (ej. Diplomado en Ciencias de Datos Softura-UATx).'],
            ];

            $sort = 0;
            foreach ($points as $point) {
                $section->items()->create([
                    'sort_order' => $sort++,
                    'data'       => array_merge($point, ['kind' => 'point']),
                ]);
            }

            foreach (config('softura-content.rse_ies', []) as $ies) {
                $section->items()->create([
                    'sort_order' => $sort++,
                    'data'       => [
                        'kind' => 'logo',
                        'alt'  => $ies['alt'],
                        'file' => $ies['file'] ?? '',
                        'cdn'  => $ies['cdn'] ?? '',
                    ],
                ]);
            }
        }
    }

    private function seedBituyuPreview(): void
    {
        $bituyu = config('softura-content.bituyu', []);

        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'bituyu_preview'],
            [
                'content' => [
                    'kicker'        => 'Producto destacado',
                    'title'         => 'Ecosistema <span>Bituyú</span>',
                    'description'   => $bituyu['descripcion'] ?? 'Plataforma tecnológica para la gestión de promociones y digitalización de MiPyMEs para Sindicatos, IES, Grupos Empresariales y Municipios.',
                    'diagram_image' => 'img/ecosistema bituyu.png',
                    'cta_text'      => 'Conoce Bituyú',
                    'cta_url'       => '/productos#sec-bituyu',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            foreach ($bituyu['stats'] ?? [] as $i => $stat) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => [
                        'value' => $stat['valor'],
                        'label' => $stat['label'],
                    ],
                ]);
            }
        }
    }

    private function seedProceso(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'proceso'],
            [
                'content' => [
                    'title'       => 'Con nuestros modelos de externalización,<br>seremos tus verdaderos <strong>aliados de negocio</strong>',
                    'footer_text' => 'Hagamos equipo y <strong>deja de preocuparte</strong> de los costos de reclutamiento, selección, capacitación y continuidad del personal.',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $cards = [
                [
                    'title'       => 'Onshoring',
                    'description' => 'Nuestros ingenieros trabajan directamente en tus instalaciones ubicadas en México cuando así se requiera.',
                ],
                [
                    'title'       => 'Nearshoring',
                    'description' => 'Nuestros ingenieros trabajan remotamente en proyectos para tu empresa ubicada en E.U.A o Latinoamérica.',
                ],
            ];

            foreach ($cards as $i => $card) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => $card,
                ]);
            }
        }
    }

    private function seedStack(): void
    {
        $section = PageSection::firstOrCreate(
            ['page_slug' => 'inicio', 'section_key' => 'stack'],
            [
                'content' => [
                    'kicker'      => 'Portafolio',
                    'title'       => 'Nuestros <span>productos</span>',
                    'description' => 'Soluciones diseñadas para optimizar procesos, automatizar tareas y acelerar el crecimiento de tu organización.',
                    'cta_text'    => 'Ver todos los productos',
                    'cta_url'     => '/productos',
                ],
                'is_visible' => true,
            ]
        );

        if ($section->items()->count() === 0) {
            $products = [
                ['name' => 'Bituyú', 'description' => 'Red virtual de negocios', 'logo' => 'img/bituyu compras.png', 'url' => '/productos#sec-bituyu'],
                ['name' => 'Binibiaa', 'description' => 'Comercio artesanal', 'logo' => 'img/binibia.png', 'url' => '/productos#sec-binibiaa'],
                ['name' => 'Academika', 'description' => 'Plataforma académica', 'logo' => 'img/academica.png', 'url' => '/productos#sec-academika'],
                ['name' => 'SIGA', 'description' => 'E-Learning', 'logo' => 'img/official/siga.png', 'url' => '/productos#sec-siga'],
                ['name' => 'Fenyx Admin', 'description' => 'Punto de venta', 'logo' => 'img/fenix.png', 'url' => '/productos#sec-fenix-orbit'],
                ['name' => 'MI PBR', 'description' => 'Presupuesto por resultados', 'logo' => 'img/official/pbr.png', 'url' => '/productos#pbr-full-section'],
                ['name' => 'SSPIP', 'description' => 'Industria petrolera', 'logo' => 'img/sspip.png', 'url' => '/productos#sec-sspip'],
            ];

            foreach ($products as $i => $product) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data'       => $product,
                ]);
            }
        }
    }
}
