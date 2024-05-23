@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/news/{{ $news->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group mb-3">
          <label for="title">Title</label>
          <input name="title" class="form-control" id="title" value="{{ $news->title }}">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $news->content }}</textarea>
        </div>
        <div class="form-group mb-3">
            <div><label for="exampleFormControlFile1">News Header</label></div>
            <input name="picture" type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div>

        {{-- PR 
            edit or keep the picture function
            button tags: change or add more button => save into tags table
        --}}
            
            {{-- tags position --}}
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline mb-3">
                <input name="tags[]" class="form-check-input" type="checkbox" id="tag{{ $tag->id }}" value="{{ $tag->id }}" @checked($news->tags->contains($tag->id))>
                <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
            @endforeach
            
        </div>
        <button class="btn btn-primary">Save</button>
        <a class="btn btn-secondary" href="{{ route('news.show', $news->id) }}" role="button" onclick="return confirm('Are you sure you want to cancel all changes?')">Cancel</a>
    </form>
    <form action="{{ route('news.destroy', $news->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
    </form>
</div>
@endsection