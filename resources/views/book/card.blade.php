<div class="card">
    <img src="/storage/{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->title }} cover image">

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

        @if ($book->content_file)
            <a href="/storage/{{ $book->content_file }}" class="btn btn-primary mt-2" target="_blank">Voir le PDF</a>
            <a href="/" class="btn btn-primary mt-2" target="_blank">Télécharger le PDF</a>

        @endif
    </div>
</div>
