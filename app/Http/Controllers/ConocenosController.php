<?php

namespace App\Http\Controllers;

use App\Models\PageSection;

class ConocenosController extends Controller
{
    public function index()
    {
        $sections = PageSection::forPage('conocenos');
        return view('conocenos', compact('sections'));
    }
}
