@extends('base')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h2>Bibliothèque numérique</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo quis sunt quod nulla sapiente amet perspiciatis? Dignissimos, ipsum laborum nulla, sed alias laboriosam molestiae nam hic sapiente quidem explicabo vel.</p>

        </div>
    </div>

    <div class="container">
        <h2>Nos 4 derniers livres</h2>
        <div class="row">
            @foreach ($books as $book)
                <div class="col">
                    @include('book.card')
                </div>
            @endforeach

        </div>
    </div>


@endsection
