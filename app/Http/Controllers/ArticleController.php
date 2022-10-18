<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController extends Controller
{
    //index @return \Inertia\Response
    public function index()
    {


        return Inertia::render('Articles/Index', [
            'articles' => Article::with('user')->get(),
        ]);
    }

//    //show @return \Inertia\Response
//    public function show(Article $article)
//    {
//        return Inertia::render('Articles/Show', [
//            'article' => $article,
//        ]);
//    }
    //create @return \Inertia\Response
    public function create()
    {
        return Inertia::render('Articles/Create', [
            'categories' => Category::orderBy('id')->pluck('name'),
            'tags' => Tag::orderBy('id')->pluck('name'),
        ]);
    }

    //store media
    public function temp_store_media(Request $request) {
        return $request->all();
    }

}
