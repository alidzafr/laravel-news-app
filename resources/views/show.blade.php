@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width: 65rem;">
        <img src="/storage/{{ $news->picture }}" class="w-100">
        <div class="card-body">
            <h5><strong>{{ $news->user->name }}</strong> | {{ $news->created_at }}</h5>
            <div class="d-grid gap-2 d-md-flex py-2">
            @foreach ($news->tags as $tag)
                <a href="#" class="btn btn-outline-secondary btn-sm" role="button">{{ $tag->name }}</a>
                {{-- @if (!$loop->last)
                ,
                @endif --}}
            @endforeach
            </div>
            <h1 class="pt-2 card-title">{{ $news->title }}</h1>
            <p class="card-text">{{ $news->content }}</p>
        </div>
    </div>                
            
    {{-- 
        1. format tanggal, link tag
        2. style pada content : header2, bold dan huruf miring
        3. lebih dari satu halaman => 1 card untuk 1 halaman
    --}}
</div>
@endsection