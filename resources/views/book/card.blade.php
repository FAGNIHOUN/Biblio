<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('books.show', ['slug' => $book->getSlug(), 'book' => $book]) }}">
                {{$book->title}}
            </a>
        </h5>
        <p class="card-text">
            <p>Genre: {{ $book->genre }}</p>
            <p>Description: {{ $book->description }}</p>
        </p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ $book->author }}
        </div>
    </div>
</div>
