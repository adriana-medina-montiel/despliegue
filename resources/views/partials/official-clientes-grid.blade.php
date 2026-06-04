@php $sectores = config('softura-content.clientes', []); @endphp
<div class="sp-clientes-grid rev">
  @foreach($sectores as $sector)
  <article class="sp-clientes-sector">
    <h3>{{ $sector['sector'] }}</h3>
    <div class="sp-logo-strip">
      @foreach($sector['logos'] as $logo)
        @include('partials.official-logo', [
          'file' => $logo['file'] ?? null,
          'cdn' => $logo['cdn'] ?? null,
          'alt' => $logo['alt'] ?? '',
          'class' => 'sp-official-logo sp-official-logo--client',
        ])
      @endforeach
    </div>
  </article>
  @endforeach
</div>
