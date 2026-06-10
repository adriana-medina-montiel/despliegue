<?php

namespace App\Http\Controllers;

use App\Models\PageSection;

class PublicController extends Controller
{
    public function home()
    {
        $sections = PageSection::forPage('inicio');
        return view('home', compact('sections'));
    }

    public function fabrica()
    {
        $sections = PageSection::forPage('fabrica');
        return view('fabrica', compact('sections'));
    }

    public function nearshoring()
    {
        $sections = PageSection::forPage('nearshoring');
        return view('nearshoring', compact('sections'));
    }

    public function productos()
    {
        $sections = PageSection::forPage('productos');
        return view('productos', compact('sections'));
    }

    public function blog()
    {
        $sections = PageSection::forPage('blog');
        $postsSection = PageSection::get('blog', 'posts');
        $posts = $postsSection ? $postsSection->items : collect();
        return view('blog.index', compact('sections', 'posts'));
    }
}
