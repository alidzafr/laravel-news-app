@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($news as $item)
            <div class="col">
                <div class="card h-100">
                    <a href="{{ route('news.show', $item->id) }}" class="stretched-link">
                        <img src="/storage/{{ $item->picture }}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::words(strip_tags($news[0]->content), 150) }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
    
    
@endsection