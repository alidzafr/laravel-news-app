<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1>Semua Berita</h1>

        {{-- bg-black  --}}
        <div class="row my-4" style="width: 62rem">
            @if($news->isNotEmpty())
            <div class="col">
                {{-- width 40rem / 54rem --}}
                <div class="card" style="max-width: 40rem">
                    <a href="{{ route('news.show', $news[0]->id) }}">
                        <img class="card-img-top" src="/storage/{{ $news[0]->picture }}" alt="Card image cap">
                    </a>
                    <div class="card-body" style="height: 300px">
                        <a href="{{ route('news.show', $news[0]->id) }}" class="text-reset text-decoration-none">
                            <h5 class="card-title fw-bold">{{ str_limit($news[0]->title, 50) }}</h5>
                        </a>
                        {{-- <p class="card-text">{{ str_limit($news[0]->content, 200) }}</p> --}}
                        <p class="card-text">{{ \Illuminate\Support\Str::words(strip_tags($news[0]->content), 50) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $news[0]->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
                
            <div class="col-md-4">
                @foreach($news->slice(1,2) as $item)
                    
                <div class="card mb-3">
                    <a href="{{ route('news.show', $item->id) }}">
                        <img class="card-img-top" src="/storage/{{ $item->picture }}" alt="Card image cap">
                        
                    </a>
                    <div class="card-body">
                        <a href="{{ route('news.show', $item->id) }}" class="text-reset text-decoration-none">
                            <h5 class="card-title fw-bold">{{ str_limit($item->title, 50) }}</h5>
                        </a>
                        <p class="card-text">{{ \Illuminate\Support\Str::words(strip_tags($news[0]->content), 10) }}</p>
                        <p class="card-text"><small class="text-muted">{{ $news[0]->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
                @endforeach
            </div> 
            @endif
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5" style="width: 62rem">

        {{-- $key for number of item --like iteration --}}
        @foreach ($news->slice(3) as $key => $item)
        
        @if (($key + 1) % 7 != 0)
            <div class="col">
                <div class="card h-100">
                    <a href="{{ route('news.show', $item->id) }}">
                        <img class="card-img-top" src="/storage/{{ $item->picture }}" alt="Card image cap">
                        <div class="card-img-overlay">
                            @foreach ($item->tags->slice(0,1) as $tag)
                            <a href="{{ route('news.category', $tag->id) }}">
                                <button type="button" class="btn btn-sm btn-outline-light" disabled>{{ $tag->name }}</button>
                            </a>
                            @endforeach
                        </div>
                    </a>
                    <div class="card-body">
                        <a href="{{ route('news.show', $item->id) }}" class="text-reset text-decoration-none">
                            <h5 class="card-title fw-bold">{{ str_limit($item->title, 50) }}</h5>
                        </a>
                        <p class="card-text">{{ \Illuminate\Support\Str::words(strip_tags($item->content), 20) }}</p>
                    </div>
                </div>
            </div>
            {{-- Close row after every third card --}}
        @else
        </div>

        <div class="row" style="max-width: 62rem;">
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-6 text-white">
                            <img src="/storage/{{ $item->picture }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                            <h1 class="card-title fw-bolder">{{ str_limit($item->title, 50) }}</h1>
                            <p class="card-text">{{ \Illuminate\Support\Str::words(strip_tags($item->content), 40) }}</p>
                            <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row row-cols-1 row-cols-md-3 g-4 my-5" style="width: 62rem">
        @endif
        @endforeach
        {{-- Pagination: berita lainnya --}}
        </div>
        <div class="d-flex justify-content-start">
            {{ $news->links() }}
        </div>
        
    </div>

    @endsection
    
</body>
</html>