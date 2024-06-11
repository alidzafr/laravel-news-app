<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

class NewsController extends Controller
{
    
    public function index() 
    {
        $news = News::with(['tags', 'user'])->paginate(20);
        
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
        $imagePath = request('picture') ? request('picture')->store('uploads', 'public') : '-';

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
        return redirect()->route('news.show', $news->id);
    }

    public function show(News $news)
    {
        return view('show', compact('news'));
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);
        // $news = News::findorFail($id);
        $tags = Tag::all();
        
        return view('edit', compact('news', 'tags'));
    }
    
    public function update(News $news)
    {
        $this->authorize('update', $news);

        $data = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'picture' => '',
        ]);

        // if user inserting new image
        if(request('picture')) {
            $imagePath = request('picture')->store('uploads', 'public');

            Image::configure(['driver' => 'imagick']);
            $picture = image::make(public_path("storage/{$imagePath}"))->fit(1200, 700);
            $picture->save();

            $imageArr = ['picture' => $imagePath];
        }

        $news->update(array_merge(
            $data,
            $imageArr ?? [] 
        ));
        $tags = request()->input('tags');
        $news->tags()->sync($tags);

        return to_route('news.show', $news->id);
    }

    public function destroy(News $news)
    {
        $this->authorize('delete', $news);

        $news->tags()->detach();

        $news->delete();

        return redirect()->route('news.index');
    }

    public function indexCategory()
    {
        $tag = Tag::all()->first();
        return to_route('news.category', $tag->id);
    }

    public function category(Tag $tag)
    {
        $news = $tag->news()->get();
        $allTags = Tag::all();
        return view('category', compact('news', 'tag', 'allTags'));
        // dd($news);
    }

    public function author(User $user)
    {
        $news = $user->news()->get();
        return view('author', compact('news'));
        // dd($news);
    }

}
