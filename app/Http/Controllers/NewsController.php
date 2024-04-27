<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Tag;
use Intervention\Image\ImageManagerStatic as Image;

class NewsController extends Controller
{
    
    public function index() 
    {
        $news = News::with(['tags', 'user'])->get();
        
        return view('index', compact('news'));
    }

    public function create() 
    {
        // Mengambil semua tag untuk ditampilkan dalam form
        $tags = Tag::all();
        
        // Mengirim data tag ke view form pembuatan berita baru
        return view('create', compact('tags'));
    }

    public function store(Request $request) 
    {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'picture' => 'nullable',
            'tags' => 'array'
        ]);
        
        $news = new News;
        $news->user_id = auth()->user()->id;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->picture = $request->input('picture') ?? '';
        $news->save();
        
        $tags = $request->input('tags');
        $news->tags()->attach($tags);

        // dd(request()->all());
        return redirect()->route('article.index');
    }
}
