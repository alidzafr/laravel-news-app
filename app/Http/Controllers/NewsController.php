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

        // dd(request('picture')->store('uploads', 'public'));

        // Don't forget to artisan storage:link. otherwise the folder will not accesible
        // it will create link folder public/storage from storage/app/public
        $imagePath = request('picture')->store('uploads', 'public');

        Image::configure(['driver' => 'imagick']);
        $image = image::make(public_path("storage/{$imagePath}"))->fit(1200, 700);
        $image->save();
        
        $news = new News;
        $news->user_id = auth()->user()->id;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->picture = $imagePath;
        $news->save();
        
        $tags = $request->input('tags');
        $news->tags()->attach($tags);

        // dd(request()->all());
        // redirect menuju view dari berita yang baru di upload : redirect('/news/' .$request->id)
        return redirect()->route('article.index');
    }

    public function show(News $news)
    {
        return view('show', compact('news'));
    }
}
