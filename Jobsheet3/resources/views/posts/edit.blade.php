<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label>
            <input name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div>
            <label>Body</label>
            <textarea name="body">{{ old('body', $post->body) }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('posts.index') }}">Back</a>
</body>
</html>
