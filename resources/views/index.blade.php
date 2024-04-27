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
            <div class="card mb-3">
                <img class="card-img-top" src="https://cdn-cooko.nitrocdn.com/dlaHYojSdUILBDieEoKhuePRMJCdRncv/assets/static/optimized/rev-7800a50/www.apertureadventure.com/wp-content/uploads/2022/12/a70f0d10e86968d32619793693c30ff9.layers-of-rolling-sand-at-white-sands.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            </div>
            {{-- looping card --}}
            @foreach ($news as $item)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{ str_limit($item->title, 50) }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->user->name}}</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    @foreach ($item->tags as $tag)
                    <a href="#" class="card-link">{{ $tag->name }}</a>
                    @endforeach
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    @endsection
    
</body>
</html>