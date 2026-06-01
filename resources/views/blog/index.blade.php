@extends('layouts.web')

@section('title', 'Blog — Softura Solutions')

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
@endpush

@section('content')

<section style="min-height:80vh;padding:8rem 5vw 4rem;">
  <div style="max-width:1200px;margin:0 auto;">
    <div class="sec-label" style="text-transform:uppercase;letter-spacing:3px;margin-bottom:1rem;">Blog</div>
    <h1 style="font-family:'Syne',sans-serif;font-size:clamp(2.5rem,5vw,4rem);font-weight:800;line-height:1.15;margin-bottom:1rem;">
      Insights &amp; Tecnología
    </h1>
    <p style="font-size:1.1rem;color:#6B6B80;max-width:600px;margin-bottom:3rem;">
      Artículos sobre desarrollo de software, tendencias tecnológicas y mejores prácticas.
    </p>

    @if(isset($posts) && $posts->count())
      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:2rem;">
        @foreach($posts as $post)
        <article style="background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.06);transition:transform 0.2s;">
          @if($post->imagen)
          <img src="{{ Storage::url($post->imagen) }}" alt="{{ $post->titulo }}" style="width:100%;height:200px;object-fit:cover;">
          @endif
          <div style="padding:1.5rem;">
            <p style="font-size:0.8rem;color:#1A4FFF;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin-bottom:0.5rem;">
              {{ $post->created_at->format('d M Y') }}
            </p>
            <h2 style="font-family:'Syne',sans-serif;font-size:1.25rem;font-weight:700;margin-bottom:0.75rem;line-height:1.3;">
              {{ $post->titulo }}
            </h2>
            <p style="color:#6B6B80;font-size:0.9rem;line-height:1.6;margin-bottom:1.25rem;">
              {{ Str::limit($post->extracto ?? $post->contenido, 120) }}
            </p>
            <a href="{{ route('blog.show', $post->slug) }}" style="color:#1A4FFF;font-weight:600;font-size:0.9rem;text-decoration:none;">
              Leer artículo →
            </a>
          </div>
        </article>
        @endforeach
      </div>
    @else
      <div style="text-align:center;padding:4rem 0;color:#94a3b8;">
        <p style="font-size:1.1rem;">Próximamente nuevos artículos.</p>
      </div>
    @endif
  </div>
</section>

@endsection
