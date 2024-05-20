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
        <div class="row">
            @if($news->isNotEmpty())
            <div class="d-flex">
                {{-- width 40rem / 54rem --}}
                <div class="card my-3" style="width: 40rem">
                    <a href="{{ route('news.show', $news[0]->id) }}">
                        <img class="card-img-top" src="/storage/{{ $news[0]->picture }}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('news.show', $news[0]->id) }}" class="text-reset text-decoration-none">
                            <h5 class="card-title fw-bold">{{ str_limit($news[0]->title, 50) }}</h5>
                        </a>
                        <p class="card-text">{{ $news[0]->content }}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                
                <div class="col-md-3">
                    @foreach($news->slice(1,2) as $item)
                        
                    <div class="card ms-3 my-3">
                        <a href="{{ route('news.show', $item->id) }}">
                            <img class="card-img-top" src="/storage/{{ $item->picture }}" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('news.show', $item->id) }}" class="text-reset text-decoration-none">
                                <h5 class="card-title fw-bold">{{ str_limit($item->title, 50) }}</h5>
                            </a>
                            <p class="card-text">{{ $item->content }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <div class="row">
            {{-- $key for number of item --like iteration --}}
            @foreach ($news->slice(3) as $key => $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <a href="{{ route('news.show', $item->id) }}">
                        <img class="card-img-top" src="/storage/{{ $item->picture }}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('news.show', $item->id) }}" class="text-reset text-decoration-none">
                            <h5 class="card-title fw-bold">{{ str_limit($item->title, 50) }}</h5>
                        </a>
                        <p class="card-text">{{ $item->content }}</p>
                    </div>
                </div>
            </div>
            {{-- Close row after every third card --}}
                @if(($key + 1) % 3 == 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
            
        </div>
        {{-- Pagination: berita lainnya --}}

    </div>

    @endsection
    
</body>
</html>