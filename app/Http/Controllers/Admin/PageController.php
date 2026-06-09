<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
class PageController extends Controller
{
    public function inicio()      { return view('admin.pages.inicio'); }
    public function fabrica()     { return view('admin.pages.fabrica'); }
    public function nearshoring() { return view('admin.pages.nearshoring'); }
    public function productos()   { return view('admin.pages.productos'); }
    public function blog()        { return view('admin.pages.blog'); }
    public function conocenos()   { return view('admin.pages.conocenos'); }
}
