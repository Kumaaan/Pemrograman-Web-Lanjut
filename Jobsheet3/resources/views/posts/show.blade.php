<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p>By: {{ $post->user?->name }}</p>
    <a href="{{ route('posts.index') }}">Back</a>
</body>
</html>
