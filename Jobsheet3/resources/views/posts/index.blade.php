<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Posts</title>
</head>
<body>
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                - <a href="{{ route('posts.edit', $post) }}">edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{ $posts->links() }}
</body>
</html>
