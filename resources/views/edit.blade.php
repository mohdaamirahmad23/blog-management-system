<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h2>Edit Post</h2>

        <form action="/update-post/{{ $post->id }}" method="POST">

            @csrf

            <input
                type="text"
                name="title"
                value="{{ $post->title }}"
                class="form-control mb-3"
            >
            <select name="category" class="form-control mb-3">

    <option value="Admit Card">Admit Card</option>

    <option value="Result">Result</option>

    <option value="Job">Job</option>

    <option value="Answer Key">Answer Key</option>

</select>

            <textarea
                name="content"
                class="form-control mb-3"
            >{{ $post->content }}</textarea>

            <button class="btn btn-success">
                Update Post
            </button>

        </form>

    </div>

</div>

</body>
</html>