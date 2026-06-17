<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TecnologiasController extends Controller
{
    private const DEFAULTS = [
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
        ['Kotlin', 'kotlin'],
    ];

    public function edit()
    {
        $section = PageSection::get('inicio', 'tecnologias') ?? abort(404);

        if ($section->items()->count() === 0) {
            foreach (self::DEFAULTS as $i => [$name, $slug]) {
                $section->items()->create([
                    'sort_order' => $i,
                    'data' => [
                        'name' => $name,
                        'logo' => 'https://cdn.simpleicons.org/' . $slug,
                    ],
                ]);
            }
        }

        $items = $section->items()->orderBy('sort_order')->get();

        return view('admin.inicio.tecnologias', compact('section', 'items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kicker'       => 'required|string|max:100',
            'title'        => 'required|string|max:255',
            'description'  => 'required|string|max:2000',
            'quote'        => 'nullable|string|max:500',
            'tech_name.*'  => 'required|string|max:80',
            'tech_logo.*'  => 'nullable|string|max:500',
            'tech_file.*'  => 'nullable|image|max:2048',
        ]);

        $section = PageSection::get('inicio', 'tecnologias') ?? abort(404);

        $section->update([
            'content' => [
                'kicker'      => $request->kicker,
                'title'       => $request->title,
                'description' => $request->description,
                'quote'       => $request->quote,
            ],
            'is_visible' => $request->boolean('is_visible'),
        ]);

        $section->items()->delete();

        $names = $request->input('tech_name', []);
        $logos = $request->input('tech_logo', []);
        $files = $request->file('tech_file', []);
        $count = 0;

        foreach ($names as $i => $name) {
            if (trim($name) === '' || $count >= 50) {
                continue;
            }

            $logo = $logos[$i] ?? '';

            if (isset($files[$i]) && $files[$i]->isValid()) {
                $logo = $files[$i]->store('inicio/tecnologias', 'public');
            }

            $section->items()->create([
                'sort_order' => $count,
                'data' => [
                    'name' => trim($name),
                    'logo' => $logo,
                ],
            ]);

            $count++;
        }

        return redirect()->route('admin.inicio.tecnologias.edit')
            ->with('success', "Stack tecnológico actualizado ({$count} tecnologías guardadas).");
    }
}
