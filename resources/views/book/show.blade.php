@extends('base')

@section('title', $book->title)

@section('content')
    <div class="container">
            <h1>Titre: {{$book->title}}</h1>
        <h2>
            Genre: {{ $book->genre }}
            <br>
            Description: {{ $book->description }}
        </h2>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ $book->author }}
        </div>

        <button class="btn btn-primary" > Lire le lire </button>
        <button class="btn btn-primary"> Télécharger le lire </button>
        
    </div>
@endsection