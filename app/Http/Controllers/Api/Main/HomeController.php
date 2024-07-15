<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\Controller;
use App\Http\Resources\Main\ArticleResource;
use App\Models\Article;
use App\Models\Service;

class HomeController extends Controller
{
    public function getArticle()
    {
        $articles = Article::where('published', true)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->with('user')
                        ->get();
        $services = Service::where('is_active', true)
                        ->get();

        $articlesResource = ArticleResource::collection($articles);

        return response()->json([
            'articles' => $articlesResource,
        ]);
    }
}
