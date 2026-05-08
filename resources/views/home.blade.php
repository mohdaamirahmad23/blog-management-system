<!DOCTYPE html>
<html>
<head>
    <title>Blog Project</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <div class="row mb-4">

    <div class="col-12 col-md-4 mb-3">

        <div class="card p-3 shadow text-center">

            <h3>{{ $totalPosts }}</h3>

            <p>Total Posts</p>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card p-3 shadow text-center">

            <h3>{{ $pendingPosts }}</h3>

            <p>Pending Posts</p>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card p-3 shadow text-center">

            <h3>{{ $completedPosts }}</h3>

            <p>Completed Posts</p>

        </div>

    </div>

</div>

    <div class="card p-4 shadow">

        <h2 class="mb-4">Add Blog Post</h2>
        <a href="/logout" class="btn btn-danger mb-3">

    Logout

</a>
        @if($errors->any())
        @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{ $error }}</p>

        @endforeach

    </div>

@endif

<form method="GET" action="/" class="mb-4">

    <input
        type="text"
        name="search"
        class="form-control"
        id="searchInput"
        placeholder="Search post"
    >

</form>
<select id="categoryFilter" class="form-control mb-4">

    <option value="">Filter By Category</option>

    <option value="Admit Card">Admit Card</option>

    <option value="Result">Result</option>

    <option value="Job">Job</option>

    <option value="Answer Key">Answer Key</option>

</select>
<input
    type="date"
    id="dateFilter"
    class="form-control mb-4"
>
<form action="/add-post" method="POST" enctype="multipart/form-data">
            @csrf

            <input
                type="text"
                name="title"
                class="form-control mb-3"
                placeholder="Enter title"
            >

            <textarea
                name="content"
                class="form-control mb-3"
                placeholder="Enter content"
            ></textarea>
            <select name="category" class="form-control mb-3">

    <option value="Admit Card">Admit Card</option>

    <option value="Result">Result</option>

    <option value="Job">Job</option>

    <option value="Answer Key">Answer Key</option>

</select>
            <input
    type="file"
    name="image"
    class="form-control mb-3"
>
            <select name="status" class="form-control mb-3">

    <option value="Pending">Pending</option>

    <option value="Completed">Completed</option>

</select>

            <button class="btn btn-primary">
                Add Post
            </button>

        </form>

    </div>

    <div class="mt-5" id="postData">

        <h2>All Posts</h2>

        @foreach($posts as $post)

            <div class="card border-0 shadow-lg mb-4 rounded-4 p-3">

                <h4 class="fw-bold mb-3">

    {{ $post->title }}

</h4>
                <p>

    Category:

    <strong>{{ $post->category }}</strong>

</p>
                @if($post->image)

    <img
        src="/uploads/{{ $post->image }}"
        class="img-fluid rounded mb-3"
        class="mb-3"
    >

@endif

                <p class="text-muted">

    {{ Str::limit($post->content, 120) }}

</p>
                <a href="/blog/{{ $post->id }}" class="btn btn-dark mb-2">

    Read More

</a>
                @if($post->status == 'Pending')

    <span class="badge text-bg-warning me-2 mb-2">

    Pending

</span>

@else

   <span class="badge text-bg-success me-2 mb-2">

    Completed

</span>

@endif
                <a href="/edit-post/{{ $post->id }}" class="btn btn-warning mb-2 me-2">
    Edit
</a>
                <a href="/delete-post/{{ $post->id }}" class="btn btn-danger">
    Delete
</a>

            </div>

        @endforeach

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$('#categoryFilter').change(function(){

    var category = $(this).val();

    $.ajax({

        url: '/filter-posts',

        type: 'GET',

        data: {
            category: category
        },

        success:function(response)
        {
            $('#postData').html(response);
        }

    });

});
$('#dateFilter').change(function(){

    var date = $(this).val();

    $.ajax({

        url: '/filter-date',

        type: 'GET',

        data: {
            date: date
        },

        success:function(response)
        {
            $('#postData').html(response);
        }

    });

});
$('#searchInput').keyup(function(){

    var search = $(this).val();

    $.ajax({

        url: '/search-posts',

        type: 'GET',

        data: {
            search: search
        },

        success:function(response)
        {
            $('#postData').html(response);
        }

    });

});
</script>
</body>
</html>