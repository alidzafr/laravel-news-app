@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/" enctype="multipart/form-data" method="POST">
        {{-- @method('post') --}}
        @csrf
        <div class="form-group mb-3">
          <label for="title">Title</label>
          <input name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>
        <div class="form-group mb-3">
            <div><label for="exampleFormControlFile1">News Header</label></div>
            <input name="picture" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div>
            {{-- Looping tags --}}
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline mb-3">
                <input name="tags[]" class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection