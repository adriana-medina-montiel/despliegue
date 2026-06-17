@php
$techSection = \App\Models\PageSection::get('inicio', 'tecnologias');
$techItems   = $techSection?->items()->orderBy('sort_order')->get();

if ($techItems && $techItems->count() > 0) {
    $techs = $techItems->map(fn($item) => [
        'name' => $item->data('name', ''),
        'logo' => $item->data('logo', ''),
    ])->filter(fn($t) => $t['name'] !== '')->values();
} else {
    $techs = collect([
        ['name' => 'Git',          'logo' => 'https://cdn.simpleicons.org/git'],
        ['name' => 'GitHub',       'logo' => 'https://cdn.simpleicons.org/github'],
        ['name' => 'GitLab',       'logo' => 'https://cdn.simpleicons.org/gitlab'],
        ['name' => 'Bitbucket',    'logo' => 'https://cdn.simpleicons.org/bitbucket'],
        ['name' => 'Jira',         'logo' => 'https://cdn.simpleicons.org/jira'],
        ['name' => 'SonarQube',    'logo' => 'https://cdn.simpleicons.org/sonarqube'],
        ['name' => 'Android',      'logo' => 'https://cdn.simpleicons.org/android'],
        ['name' => 'Swift',        'logo' => 'https://cdn.simpleicons.org/swift'],
        ['name' => 'Xamarin',      'logo' => 'https://cdn.simpleicons.org/xamarin'],
        ['name' => 'Python',       'logo' => 'https://cdn.simpleicons.org/python'],
        ['name' => 'PHP',          'logo' => 'https://cdn.simpleicons.org/php'],
        ['name' => '.NET',         'logo' => 'https://cdn.simpleicons.org/dotnet'],
        ['name' => 'Java',         'logo' => 'https://cdn.simpleicons.org/openjdk'],
        ['name' => 'Spring',       'logo' => 'https://cdn.simpleicons.org/springboot'],
        ['name' => 'Azure',        'logo' => 'https://cdn.simpleicons.org/microsoftazure'],
        ['name' => 'AWS',          'logo' => 'https://cdn.simpleicons.org/amazonaws'],
        ['name' => 'Google Cloud', 'logo' => 'https://cdn.simpleicons.org/googlecloud'],
        ['name' => 'Docker',       'logo' => 'https://cdn.simpleicons.org/docker'],
        ['name' => 'Jenkins',      'logo' => 'https://cdn.simpleicons.org/jenkins'],
        ['name' => 'Apache',       'logo' => 'https://cdn.simpleicons.org/apache'],
        ['name' => 'MySQL',        'logo' => 'https://cdn.simpleicons.org/mysql'],
        ['name' => 'PostgreSQL',   'logo' => 'https://cdn.simpleicons.org/postgresql'],
        ['name' => 'MongoDB',      'logo' => 'https://cdn.simpleicons.org/mongodb'],
        ['name' => 'Oracle',       'logo' => 'https://cdn.simpleicons.org/oracle'],
        ['name' => 'React',        'logo' => 'https://cdn.simpleicons.org/react'],
        ['name' => 'Angular',      'logo' => 'https://cdn.simpleicons.org/angular'],
        ['name' => 'Vue.js',       'logo' => 'https://cdn.simpleicons.org/vuedotjs'],
        ['name' => 'Node.js',      'logo' => 'https://cdn.simpleicons.org/nodedotjs'],
        ['name' => 'Laravel',      'logo' => 'https://cdn.simpleicons.org/laravel'],
        ['name' => 'HTML5',        'logo' => 'https://cdn.simpleicons.org/html5'],
        ['name' => 'CSS3',         'logo' => 'https://cdn.simpleicons.org/css3'],
        ['name' => 'JavaScript',   'logo' => 'https://cdn.simpleicons.org/javascript'],
        ['name' => 'npm',          'logo' => 'https://cdn.simpleicons.org/npm'],
        ['name' => 'Gradle',       'logo' => 'https://cdn.simpleicons.org/gradle'],
        ['name' => 'Firebase',     'logo' => 'https://cdn.simpleicons.org/firebase'],
        ['name' => 'Ionic',        'logo' => 'https://cdn.simpleicons.org/ionic'],
        ['name' => 'Kotlin',       'logo' => 'https://cdn.simpleicons.org/kotlin'],
    ]);
}
@endphp
<div class="deck-tech-logos" role="list" aria-label="Tecnologías">
  @foreach($techs as $t)
  @php
    $logo = $t['logo'];
    $src  = str_starts_with($logo, 'http') ? $logo : (str_starts_with($logo, '/') ? $logo : asset('storage/' . $logo));
  @endphp
  <div class="deck-tech-logos__item" role="listitem" title="{{ $t['name'] }}">
    <img src="{{ $src }}" alt="{{ $t['name'] }}" loading="lazy" width="36" height="36">
    <span>{{ $t['name'] }}</span>
  </div>
  @endforeach
</div>
