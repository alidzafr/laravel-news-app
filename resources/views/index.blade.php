<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    {{-- @foreach ($user->article as $articles)
        {{$articles->title}}
    @endforeach --}}
    @foreach ($articles as $item)
    <h2>
        {{ $item->title }}
        {{ $item->user->name}}
    </h2>
    @endforeach
    {{-- @dump($article) --}}
</body>
</html>