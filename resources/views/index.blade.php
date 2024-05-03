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
            <div class="d-flex">
                {{-- width 40rem / 54rem --}}
                <div class="card my-3" style="width: 40rem">
                    <img class="card-img-top" src="/storage/uploads/uOV1ccn59ClH5XOGPAY1W2Xd7hpkCFqes3cx7Vt8.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ms-3 my-3">
                        <img src="/storage/uploads/uOV1ccn59ClH5XOGPAY1W2Xd7hpkCFqes3cx7Vt8.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card ms-3 my-3">
                        <img src="/storage/uploads/uOV1ccn59ClH5XOGPAY1W2Xd7hpkCFqes3cx7Vt8.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            {{-- looping card --}}
            {{-- @foreach ($news as $item)
            <div class="col-md-4 mb-4">
                
                <div class="card" style="width: 20rem;">

                    <a href="{{ route('article.show', $item->id) }}">
                        <img class="card-img-top" src="/storage/{{ $item->picture }}" alt="Card image cap">
                    </a>

                    <div class="card-body">
                        {{ $loop->iteration }}
                        <a href="{{ route('article.show', $item->id) }}" class="text-reset text-decoration-none">
                            <h5 class="card-title fw-bold">{{ str_limit($item->title, 50) }}</h5>
                        </a>
                        <p class="card-text">{{ $item->content }}</p>
                        <div class="d-grid gap-2 d-md-flex py-2">
                        @foreach ($item->tags as $tag)
                        <a href="#" type="button" class="btn btn-outline-dark btn-sm">{{ $tag->name }}</a>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach --}}

        </div>

        <div class="row">
            {{-- Fix flex maximum width --}}
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="/storage/uploads/uOV1ccn59ClH5XOGPAY1W2Xd7hpkCFqes3cx7Vt8.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="/storage/uploads/uOV1ccn59ClH5XOGPAY1W2Xd7hpkCFqes3cx7Vt8.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3">
                    <img src="/storage/uploads/uOV1ccn59ClH5XOGPAY1W2Xd7hpkCFqes3cx7Vt8.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pagination: berita lainnya --}}

    </div>

    @endsection
    
</body>
</html>