<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function show()
    {
        $news = News::orderBy('created_at', 'desc')->take(5)->get();
        return view('home', compact('news'));
    }
}
