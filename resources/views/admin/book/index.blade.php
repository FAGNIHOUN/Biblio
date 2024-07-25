@extends('admin.admin')

@section('title', 'Tous les livres')

@section('content')

    <div class="d-flex justify-content-between align-item-center">
        <h2>@yield('title')</h2>
        <a href="{{ route('admin.book.create') }}" class="btn btn-primary">
            Ajouter un livre
        </a>
    </div>


    <table class="table table-sthiped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Genre</th>
                <th>Description</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book )
                <tr>
                    <td>{{ $book->title}}</td>
                    <td>{{ $book->author}}</td>
                    <td>{{ $book->genre}}</td>
                    <td>{{ $book->description}}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.book.edit', $book) }}" class='btn btn-primary' >Editer</a>
                            <form action="{{ route('admin.book.destroy', $book )}}" method="POST">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?');">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>

    {{ $books->links() }}

@endsection
