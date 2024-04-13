<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index() {
        $articles = Article::with('user')->get();
        
        return view('index', compact('articles'));
    }
}
