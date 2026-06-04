@extends('layouts.web')

@section('title', 'Blog — Softura Solutions')

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
@endpush

@section('content')

{{-- Definimos los datos manualmente aquí mismo --}}
@php
$posts = [
    (object)[
        'titulo' => '¿Es Python el lenguaje del futuro?', 
        'fecha' => '11/11/2020', 
        'autor' => 'Omar Hernández', 
        'extracto' => 'El lenguaje Python surgió a principios de los 90 y fue diseñado para...',
        'img' => 'python.jpg' 
    ],
    (object)[
        'titulo' => 'Diferencias entre mesa de mezclas analógica y digital', 
        'fecha' => '10/11/2020', 
        'autor' => 'Raymundo Polo', 
        'extracto' => 'Las consolas mezcladoras de audio funcionan ya sea con tecnología análoga...',
        'img' => 'mezcladora.jpg'
    ],
    (object)[
        'titulo' => 'Cifrado de datos.', 
        'fecha' => '09/11/2020', 
        'autor' => 'Victor Hugo Tamayo', 
        'extracto' => '¿Cómo se asegura la privacidad de la información?',
        'img' => 'cifrado.jpg'
    ],
    (object)[
        'titulo' => 'Objetos de aprendizaje.', 
        'fecha' => '06/11/2020', 
        'categorias' => 'Tecnología, Educación, Multimedia',
        'autor' => 'Sergey Sánchez', 
        'extracto' => 'Un objeto de aprendizaje (OA) es una unidad de contenido mínima...',
        'img' => 'objetos.jpg'
    ],
    (object)[
        'titulo' => 'Copiar y Pegar', 
        'fecha' => '29/10/2020', 
        'categorias' => 'Tecnología, Educación, Multimedia',
        'autor' => 'Irvin Lopez', 
        'extracto' => 'Aunque no tengas altos conocimientos informáticos, es muy probable que...',
        'img' => 'virus.jpg'
    ],
    (object)[
        'titulo' => 'Motores y Operadores de búsqueda', 
        'fecha' => '23/10/2020', 
        'categorias' => ' Buscadores, Web, Busquedas ·',
        'autor' => 'Enrique Corona', 
        'extracto' => 'Como sabemos, el internet es una conexión de miles incluso millones de conexiones...',
        'img' => 'bigdata.jpg'
    ],
    (object)[
        'titulo' => 'Apps y páginas para aprender más.', 
        'fecha' => '21/10/2020', 
        'categorias' => 'Apps, Aprender, En casa',
        'autor' => 'Uriel Alvarez', 
        'extracto' => 'En esta cuarentena, ¿estas aburrido?, invierte tu tiempo en cosas grandiosas...',
        'img' => 'bigdata.jpg'
    ],
     (object)[
        'titulo' => 'El impacto del COVID-19 en las MiPyMEs.', 
        'fecha' => '20/10/2020', 
        'categorias' => 'MiPyMEs, COVID-19 ',
        'autor' => 'Guillermo Alvarez', 
        'extracto' => 'Es indiscutible que el mundo ha cambiado desde que apareció el COVID-19...',
        'img' => 'bigdata.jpg'
    ],
      (object)[
        'titulo' => '¿Qué es Arduino?', 
        'fecha' => '14/10/2020', 
        'categorias' => 'Tecnología',
        'autor' => 'Caleb Hernandez', 
        'extracto' => 'Arduino es una placa programable que se utiliza normalmente en proyectos...',
        'img' => 'bigdata.jpg'
    ],
        (object)[
          'titulo' => 'E-learning', 
          'fecha' => '13/10/2020', 
          'categorias' => 'Tecnología, Informacion',
          'autor' => 'Juan Marcos Muñoz', 
          'extracto' => 'E-learning es un término abreviado en inglés para “electronic learning”...',
          'img' => 'bigdata.jpg'
    ],
          (object)[
            'titulo' => 'Importancia de la programación.', 
            'fecha' => '12/10/2020', 
            'categorias' => 'Tecnología',
            'autor' => 'Amilcar Sosa', 
            'extracto' => 'En el ámbito de la informática, la programación refiere a la acción de...',
            'img' => 'bigdata.jpg'
    ],
    (object)[
      'titulo' => 'El internet es más viejo',
      'fecha' => '11/10/2020',
      'autor' => 'Carlos Rodríguez',
      'extracto' => 'El internet tiene más de 30 años y ha evolucionado enormemente desde sus inicios...',
      'img' => 'bigdata.jpg'
    ]

];
@endphp

<section style="min-height:80vh; padding:8rem 5vw 4rem; background-color: #FAFAFA;">
  <div style="max-width:1200px; margin:0 auto;">
    
    <div class="sec-label" style="text-transform:uppercase; letter-spacing:3px; margin-bottom:1rem; color:#1A4FFF; font-weight:600; font-size: 0.9rem;">
        Blog
    </div>
    
    <h1 style="font-family:'Syne',sans-serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:800; line-height:1.15; margin-bottom:4rem;">
      Insights &amp; Tecnología
    </h1>

    {{-- Grid de tarjetas --}}
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px, 1fr)); gap:2.5rem;">
        
        @foreach($posts as $post)
        <article style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; display:flex; flex-direction:column;">
          
          <div style="width:100%; height:200px; background:#e2e8f0;">
             </div>
          
          <div style="padding:1.8rem; flex-grow:1;">
            <p style="font-size:0.75rem; color:#1A4FFF; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:0.8rem;">
              {{ $post->fecha }} • {{ $post->autor }}
            </p>
            
            <h2 style="font-family:'Syne',sans-serif; font-size:1.3rem; font-weight:700; margin-bottom:1rem; line-height:1.3; color:#1e293b;">
              {{ $post->titulo }}
            </h2>
            
            <p style="color:#6B6B80; font-size:0.95rem; line-height:1.6; margin-bottom:1.5rem;">
              {{ $post->extracto }}
            </p>
            
            <a href="#" style="display:inline-block; background:#1A4FFF; color:#fff; padding:0.7rem 1.5rem; border-radius:8px; font-weight:600; font-size:0.9rem; text-decoration:none;">
              Leer más
            </a>
          </div>
        </article>
        @endforeach
        
    </div>
  </div>
</section>

@endsection