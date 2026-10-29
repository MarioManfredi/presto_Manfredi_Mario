<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    
    public function homepage() {

        $articles = Article::where('is_accepted', true)->latest()->take(6)->get();

        return view('welcome', compact('articles'));

    }

    public function searchArticles(Request $request) {

        $query = $request->input('query');
        $field = $request->input('field');
        $articles = Article::where('is_accepted', true);

        if ($field == 'title') {

            $articles->where('title', 'LIKE', "%{$query}%");

        } elseif ($field == 'description') {

            $articles->where('description', 'LIKE', "%{$query}%");

        } elseif ($field == 'category') {

            $articles->whereHas('category', function ($q) use ($query) { $q->where('name', 'LIKE', "%{$query}%"); });

        } else {

            $articles->where(function ($q) use ($query) { 

                $q->where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->orWhereHas('category', function ($q) use ($query) { $q->where('name', 'LIKE', "%{$query}%"); });
        
            });

        }

        $articles = $articles->latest()->paginate(6);

        return view('article.search', ['articles' => $articles, 'query' => $query]);
    }

}
