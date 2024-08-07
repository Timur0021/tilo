<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Resources\Main\AboutUsResource;
use \App\Http\Resources\Service\ServiceResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Main\ArticlesResource;
use App\Http\Resources\Service\ServiceCategoryResource;
use App\Models\AboutUs;
use App\Models\Article;
use App\Models\Service;

class HomeController extends Controller
{
    public function getInformationHomePage()
    {
        $articles = Article::where('published', true)
                        ->orderBy('created_at', 'desc')
                        ->take(3)
                        ->with('user')
                        ->get();
        $services = Service::where('is_active', true)
                        ->orderBy('created_at', 'desc')
                        ->take(8)
                        ->with(['serviceCategory', 'worker'])
                        ->get();
        $about_us = AboutUs::with('advantages')->get();

        $articlesResource = ArticlesResource::collection($articles);
        $servicesResource = ServiceResource::collection($services);
        $aboutUsResource = AboutUsResource::collection($about_us);

        return response()->json([
            'articles' => $articlesResource,
            'services' => $servicesResource,
            'about_us' => $aboutUsResource,
        ]);
    }
}
