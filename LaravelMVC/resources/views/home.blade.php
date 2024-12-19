<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
<h1>To-Do List</h1>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Enter task title" required>
    <button type="submit">Add Task</button>
</form>

<ul>
    @foreach ($posts as $post)
        <li>
            <form action="{{ route('posts.update', $post) }}" method="POST" style="display: inline;">
                @csrf
                @method('PATCH')
                <input type="checkbox" {{ $post->content ? 'checked' : '' }} onclick="this.form.submit()">
            </form>
            {{ $post->title }}
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
