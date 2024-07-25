@extends('base')

@section('title', 'Tous nos livres')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="text" name="title" id="title" placeholder="Titre du livre" class="form-control" value="{{ $input['title'] ?? ''}}"> 
            <input type="text" name="author" id="author" placeholder="Nom de l'auteur" class="form-control" value="{{ $input['author'] ?? ''}}">
            <input type="text" name="genre" id="genre" placeholder="Genre du livre" class="form-control" value="{{ $input['genre'] ?? ''}}">
            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse($books as $book)
                <div class="col-3 mb-4">
                    @include('book.card')
                </div>
            @empty
            <div class="col">
                <h3><center>Aucun livre ne correspond à votre recherche</center></h3>
                <h4><center>Veuillez recherchez un autre livre pour profité d'une lecture paisibleet sans dérangement</center></h4>
            </div>
            @endforelse
                
        </div>
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>



@endsection
