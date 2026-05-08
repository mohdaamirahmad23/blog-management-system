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
        >

    @endif

    <p class="text-muted">

        {{ Str::limit($post->content, 120) }}

    </p>

    <a href="/blog/{{ $post->id }}" class="btn btn-dark mb-2">

        Read More

    </a>

</div>

@endforeach