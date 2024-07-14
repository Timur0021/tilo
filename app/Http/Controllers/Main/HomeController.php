<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getArticle()
    {
        $articles = Article::where('published', true)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->get();
        $services = Service::where('is_active', true)
                        ->get();
        return view('home', [
            'articles' => $articles,
            'services' => $services,
        ]);
    }
}
