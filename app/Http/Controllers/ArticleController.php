<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        if (!$articles->count()) {
            return response()->json(null, 204);
        }

        return response()->json($articles, 200);
    }
}
