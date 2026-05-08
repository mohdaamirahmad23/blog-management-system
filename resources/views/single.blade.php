<!DOCTYPE html>
<html>
<head>

    <title>{{ $post->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-5">

    <div class="card p-4 shadow">

        <h1>{{ $post->title }}</h1>

        <p>

            <strong>Category:</strong>

            {{ $post->category }}

        </p>

        @if($post->image)

            <img
                src="/uploads/{{ $post->image }}"
                class="img-fluid mb-4"
            >

        @endif

        <p>

            {{ $post->content }}

        </p>

    </div>

</div>

</body>
</html>