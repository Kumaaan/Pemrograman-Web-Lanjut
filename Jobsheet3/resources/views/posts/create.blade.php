<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label>Title</label>
            <input name="title" value="{{ old('title') }}">
        </div>
        <div>
            <label>Body</label>
            <textarea name="body">{{ old('body') }}</textarea>
        </div>
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('posts.index') }}">Back</a>
</body>
</html>
