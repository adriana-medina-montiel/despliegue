@php
$techs = [
  ['Git', 'git'], ['GitHub', 'github'], ['GitLab', 'gitlab'], ['Bitbucket', 'bitbucket'],
  ['Jira', 'jira'], ['SonarQube', 'sonarqube'],
  ['Android', 'android'], ['Swift', 'swift'], ['Xamarin', 'xamarin'],
  ['Python', 'python'], ['PHP', 'php'], ['.NET', 'dotnet'],
  ['Java', 'openjdk'], ['Spring', 'springboot'],
  ['Azure', 'microsoftazure'], ['AWS', 'amazonaws'], ['Google Cloud', 'googlecloud'],
  ['Docker', 'docker'], ['Jenkins', 'jenkins'], ['Apache', 'apache'],
  ['MySQL', 'mysql'], ['PostgreSQL', 'postgresql'], ['MongoDB', 'mongodb'], ['Oracle', 'oracle'],
  ['React', 'react'], ['Angular', 'angular'], ['Vue.js', 'vuedotjs'], ['Node.js', 'nodedotjs'],
  ['Laravel', 'laravel'], ['HTML5', 'html5'], ['CSS3', 'css3'], ['JavaScript', 'javascript'],
  ['npm', 'npm'], ['Gradle', 'gradle'], ['Firebase', 'firebase'], ['Ionic', 'ionic'],
];
@endphp
<div class="deck-tech-logos" role="list" aria-label="Tecnologías">
  @foreach($techs as $t)
  @php
    $label = $t[0];
    $slug = $t[1];
    $local = 'img/official/tech/'.$slug.'.png';
    $src = file_exists(public_path($local))
      ? asset($local)
      : 'https://cdn.simpleicons.org/'.$slug;
  @endphp
  <div class="deck-tech-logos__item" role="listitem" title="{{ $label }}">
    <img src="{{ $src }}" alt="{{ $label }}" loading="lazy" width="36" height="36">
    <span>{{ $label }}</span>
  </div>
  @endforeach
</div>
