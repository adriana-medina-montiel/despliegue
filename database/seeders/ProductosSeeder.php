<?php

namespace Database\Seeders;

use App\Models\PageSection;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Hero
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'hero'],
            [
                'content' => [
                    'title'            => 'Productos que <em>impulsan</em> tu organización',
                    'description'      => 'Soluciones de software personalizables para digitalizar procesos, conectar negocios y escalar resultados.',
                    'background_image' => 'img/empresas.png',
                ],
                'is_visible' => true,
            ]
        );

        // 2. Intro & Features Bar
        $intro = PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'intro'],
            [
                'content' => [
                    'badge_text'  => 'NUESTROS PRODUCTOS',
                    'title'       => 'Échale un vistazo a <span class="highlight">nuestros productos</span> y potencializa el éxito de tu organización',
                    'description' => 'Soluciones de software personalizables que se adaptan a tus necesidades y te ayudan a alcanzar <span class="highlight-blue">mejores resultados</span>.',
                ],
                'is_visible' => true,
            ]
        );

        if ($intro->items()->count() === 0) {
            $features = [
                ['icon' => 'fas fa-puzzle-piece icon-blue', 'title' => 'Soluciones', 'text' => 'personalizables'],
                ['icon' => 'fas fa-shield-alt icon-blue', 'title' => 'Tecnología segura', 'text' => 'y confiable'],
                ['icon' => 'fas fa-rocket icon-blue', 'title' => 'Optimiza procesos', 'text' => 'y aumenta productividad'],
                ['icon' => 'fas fa-headset bar-icon', 'title' => 'Soporte técnico', 'text' => 'acompañamiento'],
            ];

            foreach ($features as $i => $feat) {
                $intro->items()->create([
                    'sort_order' => $i,
                    'data' => $feat,
                ]);
            }
        }

        // 3. Catálogo (Products grid)
        $catalogo = PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'catalogo'],
            [
                'content' => [
                    'title' => 'Catálogo de Productos',
                ],
                'is_visible' => true,
            ]
        );

        if ($catalogo->items()->count() === 0) {
            $products = [
                ['title' => 'Bituyú', 'description' => 'Red virtual de negocios y tiendas digitales para MiPyMEs.', 'logo' => 'img/bituyu compras.png', 'target' => '#sec-bituyu', 'color_class' => 'indigo'],
                ['title' => 'Binibiaa', 'description' => 'Sistema de gestión cultural y administrativa.', 'logo' => 'img/binibia.png', 'target' => '#sec-binibiaa', 'color_class' => 'purple'],
                ['title' => 'Academika', 'description' => 'Plataforma académica integral para instituciones.', 'logo' => 'img/academica.png', 'target' => '#sec-academika', 'color_class' => 'blue'],
                ['title' => 'SIGA', 'description' => 'Sistema de información para la gestión académica.', 'logo' => 'img/siga.png', 'target' => '#sec-siga', 'color_class' => 'yellow'],
                ['title' => 'Fenyx Admin', 'description' => 'Administración empresarial ágil y eficiente.', 'logo' => 'img/fenix.png', 'target' => '#sec-fenix-orbit', 'color_class' => 'orange'],
                ['title' => 'MI PBR', 'description' => 'Monitoreo y control de indicadores y proyectos.', 'logo' => 'img/pbr.png', 'target' => '#pbr-full-section', 'color_class' => 'gold'],
                ['title' => 'SSPIP', 'description' => 'Sistema especializado para procesos y operaciones.', 'logo' => 'img/sspip.png', 'target' => '#sec-sspip', 'color_class' => 'gray'],
            ];

            foreach ($products as $i => $prod) {
                $catalogo->items()->create([
                    'sort_order' => $i,
                    'data' => $prod,
                ]);
            }
        }

        // 4. Bituyú Details
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'bituyu'],
            [
                'content' => [
                    'tagline'             => 'Plataforma tecnológica para la gestión de promociones y digitalización de MiPyMEs para Sindicatos, IES, Grupos Empresariales y Municipios.',
                    'google_play_url'     => '#',
                    'app_store_url'       => '#',
                    'mascot_image'        => 'img/official/productos/bituyu movil.png',
                    'eco_diagram_image'   => 'img/ecosistema bituyu.png',
                    'bar_text'            => 'Cierra la brecha digital de tu negocio con <strong>Bituyú</strong>',
                    'cta_text'            => 'Solicitar información',
                    'cta_url'             => '/contacto',
                    'stats' => [
                        ['icon' => 'fas fa-store', 'value' => '1,000+', 'label' => "MiPyME's"],
                        ['icon' => 'fas fa-shopping-basket', 'value' => '6,000+', 'label' => 'Productos y servicios'],
                        ['icon' => 'fas fa-tags', 'value' => '100+', 'label' => 'Promociones'],
                    ],
                    'features' => [
                        ['icon' => 'icon-store', 'inner_icon' => 'fas fa-store', 'title' => 'Tienda virtual', 'description' => 'Crea tu sucursal digital con catálogo, horarios y datos de contacto disponibles 24/7.'],
                        ['icon' => 'icon-promo', 'inner_icon' => 'fas fa-tags', 'title' => 'Promociones', 'description' => 'Publica descuentos y ofertas para atraer más clientes a tu negocio.'],
                        ['icon' => 'icon-map', 'inner_icon' => 'fas fa-map-marker-alt', 'title' => 'Localización', 'description' => 'Facilita que te encuentren con mapa, dirección y referencias claras.'],
                        ['icon' => 'icon-network', 'inner_icon' => 'fas fa-project-diagram', 'title' => 'Red de negocios', 'description' => 'Integra comercios locales en una red colaborativa de MiPyMEs.'],
                    ]
                ],
                'is_visible' => true,
            ]
        );

        // 5. Binibiaa Details
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'binibiaa'],
            [
                'content' => [
                    'subtitle'          => 'COMERCIALIZADORA',
                    'title'             => 'Binibiaa',
                    'slogan'            => 'La marca del artesano',
                    'description'       => 'Iniciativa que fomenta e impulsa la comercialización de productos artesanales a nivel nacional e internacional a través de las principales plataformas de comercio electrónico.',
                    'marketplace_title' => 'Conoce nuestro <strong>catálogo</strong> y <strong>pide ahora</strong> en',
                    'mlibre_url'        => 'https://www.mercadolibre.com',
                    'etsy_url'          => 'https://www.etsy.com',
                    'items' => [
                        ['image' => 'img/scronchies.jpg', 'title' => 'Scrunchies', 'description' => 'Complementos únicos que realzan tu estilo.', 'badge' => 'Premium'],
                        ['image' => 'img/reboso.jpg', 'title' => 'Rebozos', 'description' => 'Tradición y diseño en cada pieza artesanal.', 'badge' => 'Artesanal'],
                        ['image' => 'img/bolsas.jpg', 'title' => 'Bolsas', 'description' => 'Artesanía que combina elegancia and funcionalidad.', 'badge' => 'Exclusivo'],
                        ['image' => 'img/accesorios.jpg', 'title' => 'Accesorios', 'description' => 'Detalles que cuentan historias y reflejan tu esencia.', 'badge' => 'Detalles'],
                    ]
                ],
                'is_visible' => true,
            ]
        );

        // 6. Academika Details
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'academika'],
            [
                'content' => [
                    'title'       => 'ACADEMIKA',
                    'description' => 'Sistema de Servicios Escolares que permite la autorización de los procesos de control escolar de una Institución Educativa, ofreciendo mejores servicios a directivos, administrativos, docentes, alumnos y padres de familia.',
                    'modules' => [
                        ['color' => 'bg-blue-soft', 'icon' => 'fas fa-book-open icon-blue', 'title' => 'Administra planes y programas de estudios.', 'description' => 'Organiza y gestiona planes de estudio de manera eficiente.'],
                        ['color' => 'bg-purple-soft', 'icon' => 'fas fa-user-shield icon-purple', 'title' => 'Gestión de usuarios y privilegios.', 'description' => 'Controla accesos y roles para una gestión segura.'],
                        ['color' => 'bg-green-soft', 'icon' => 'fas fa-chart-bar icon-green', 'title' => 'Reportes y seguimiento académico.', 'description' => 'Genera reportes detallados y da seguimiento al desempeño.'],
                        ['color' => 'bg-orange-soft', 'icon' => 'fas fa-file-signature icon-orange', 'title' => 'Administra inscripciones y bajas.', 'description' => 'Gestiona inscripciones, bajas y actualiza información fácilmente.'],
                        ['color' => 'bg-pink-soft', 'icon' => 'fas fa-credit-card icon-pink', 'title' => 'Control de pagos.', 'description' => 'Administra pagos, adeudos y métodos de cobro.'],
                        ['color' => 'bg-cyan-soft', 'icon' => 'fas fa-calendar-alt icon-cyan', 'title' => 'Horarios, calificaciones, etc.', 'description' => 'Organiza horarios, calificaciones y demás información académica.']
                    ],
                    'features' => [
                        ['icon' => 'fas fa-database', 'text' => 'Centraliza la información en un solo sistema'],
                        ['icon' => 'fas fa-comments', 'text' => 'Mejora la comunicación entre todos los usuarios'],
                        ['icon' => 'fas fa-tachometer-alt', 'text' => 'Optimiza procesos y ahorra tiempo'],
                        ['icon' => 'fas fa-user-lock', 'text' => 'Seguridad y control en cada módulo']
                    ]
                ],
                'is_visible' => true,
            ]
        );

        // 7. SIGA Details
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'siga'],
            [
                'content' => [
                    'title'        => 'SIGA',
                    'subtitle'     => '(Sistema Integral de Gestión del Aprendizaje)',
                    'description'  => 'Permite **establecer entornos virtuales** de aprendizaje (e-Learning) mediante la distribución masiva de información, el trabajo colaborativo y la comunicación entre participantes.',
                    'laptop_image' => 'img/sigalaptop.png',
                    'features' => [
                        ['color' => 'ico-blue', 'icon' => 'fas fa-file-alt', 'title' => 'Gestión de contenidos.'],
                        ['color' => 'ico-purple', 'icon' => 'fas fa-comments', 'title' => 'Herramientas de comunicación.'],
                        ['color' => 'ico-navy', 'icon' => 'fas fa-play-circle', 'title' => 'Videos Streaming.'],
                        ['color' => 'ico-green', 'icon' => 'fas fa-book', 'title' => 'Gestión de conocimientos.'],
                        ['color' => 'ico-orange', 'icon' => 'fas fa-user-graduate', 'title' => 'Gestión de estudiantes.'],
                        ['color' => 'ico-teal', 'icon' => 'fas fa-chart-line', 'title' => 'Herramientas de seguimiento.']
                    ]
                ],
                'is_visible' => true,
            ]
        );

        // 8. Fenyx Admin Details
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'fenix_admin'],
            [
                'content' => [
                    'badge'             => 'PUNTO DE VENTA',
                    'title'             => 'FENIX ADMIN',
                    'description'       => 'Punto de venta para la gestión del proceso administrativo que conlleva la operación diaria de un negocio de giro comercial.',
                    'note_bubble_text'  => 'Agregamos, modificamos y personalizamos este producto para que se ajuste de la mejor manera a lo que <strong>tu negocio necesite.</strong>',
                    'laptop_image'      => 'img/pcfenix.png',
                    'nodes' => [
                        ['class' => 'node-compras', 'icon_class' => 'icon-blue', 'icon' => 'fas fa-shopping-cart', 'title' => 'Compras', 'description' => 'Gestiona tus compras de manera eficiente.'],
                        ['class' => 'node-proveedores', 'icon_class' => 'icon-purple', 'icon' => 'fas fa-user-tie', 'title' => 'Proveedores', 'description' => 'Administra proveedores y controla su desempeño.'],
                        ['class' => 'node-ventas', 'icon_class' => 'icon-green', 'icon' => 'fas fa-tags', 'title' => 'Ventas', 'description' => 'Optimiza tu proceso de ventas y facturación.'],
                        ['class' => 'node-inventario', 'icon_class' => 'icon-orange', 'icon' => 'fas fa-boxes', 'title' => 'Inventario', 'description' => 'Controla tu inventario en tiempo real.'],
                        ['class' => 'node-cotizaciones', 'icon_class' => 'icon-cyan', 'icon' => 'fas fa-file-invoice-dollar', 'title' => 'Cotizaciones', 'description' => 'Crea y gestiona cotizaciones fácilmente.'],
                        ['class' => 'node-facturacion', 'icon_class' => 'icon-red', 'icon' => 'fas fa-file-signature', 'title' => 'Facturación', 'description' => 'Emite facturas rápidas y sin complicaciones.']
                    ]
                ],
                'is_visible' => true,
            ]
        );

        // 9. MI PBR Details
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'mipbr'],
            [
                'content' => [
                    'badge_text'            => 'MI PBR',
                    'main_heading'          => 'Sistema para control y gestión del presupuesto basado en resultados',
                    'subheading'            => 'Genera la información necesaria para la Evaluación del Desempeño (SHD) de los entes públicos.',
                    'image'                 => 'img/corporativo.png',
                    'widget_icon'           => 'M3 3v18h18 M18.7 8l-5.1 5.2-2.8-2.7L7 14.3',
                    'objective_heading'     => 'Nuestro objetivo',
                    'objective_description' => 'Facilitar a los entes públicos una herramienta integral que mejora la planificación, el seguimiento y la evaluación del desempeño, impulsando una gestión más eficiente, transparente y orientada a resultados.',
                    'benefits' => [
                        ['text' => '<strong>Presenta los objetivos</strong> de un problema.'],
                        ['text' => '<strong>Apoya la toma de decisiones</strong> sobre los programas y la asignación de recursos.'],
                        ['text' => '<strong>Identificar y definir los factores externos</strong> al programa que pueden influir en él.'],
                        ['text' => '<strong>Propiciar la planeación participativa</strong>, y estimula el logro de acuerdos y su instrumentación.'],
                        ['text' => '<strong>Evaluar el avance en la consecución</strong> de los objetivos.'],
                        ['text' => '<strong>Apoyar el monitoreo/seguimiento</strong> y la evaluación.']
                    ]
                ],
                'is_visible' => true,
            ]
        );

        // 10. SSPIP Details
        PageSection::firstOrCreate(
            ['page_slug' => 'productos', 'section_key' => 'sspip'],
            [
                'content' => [
                    'badge_text'   => 'SSPIP',
                    'main_heading' => 'Sistema informático <strong>integral único en su tipo</strong>',
                    'subheading'   => 'A través de la incorporación de tecnologías Web, IoT y BigData Analytics permite brindar una herramienta para la maximización de <strong>seguridad y productividad</strong> de la fuerza laboral en la industria petrolera.',
                    'footer_text'  => 'Sistema desarrollado con fondos de Conacyt con el Programa de Estímulos a la Innovación (PEI).',
                    'timeline' => [
                        ['number' => '01', 'icon' => 'fas fa-chart-line', 'text' => '<strong>Genera estrategias</strong> para maximizar productividad.'],
                        ['number' => '02', 'icon' => 'fas fa-clipboard-check', 'text' => '<strong>Controla diferentes</strong> zonas.'],
                        ['number' => '03', 'icon' => 'fas fa-user-shield', 'text' => '<strong>Crea y visualiza</strong> clientes.'],
                        ['number' => '04', 'icon' => 'fas fa-map-marker-alt', 'text' => '<strong>Identifica la ubicación</strong> de las plantas.'],
                        ['number' => '05', 'icon' => 'fas fa-exclamation-triangle', 'text' => '<strong>Configura</strong> alertas.']
                    ]
                ],
                'is_visible' => true,
            ]
        );
    }
}
