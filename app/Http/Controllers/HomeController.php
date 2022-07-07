<?php

namespace App\Http\Controllers;

use App\Category;
use App\Watch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', [
            'watches' => Watch::all(),
            'categories' => Category::all()
        ]);
    }
}
