@extends('admin.admin')

@section('title', $book->exists ? 'Editer un livre' : 'Créer un livre')

@section('content')

    <h2>@yield('title')</h2>

    <form class="vstack gap-2" action="{{ route($book->exists ? 'admin.book.update' : 'admin.book.store', ['book' => $book]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method($book->exists ? 'put' : 'post')

        @include('shared.input', ['label' => 'Titre' , 'name' => 'title', 'value' => $book->title])
        @include('shared.input', ['label' => 'Auteur' , 'name' => 'author', 'value' => $book->author])
        @include('shared.input', ['label' => 'Genre' , 'name' => 'genre', 'value' => $book->genre])
        @include('shared.input', ['label' => 'Description' , 'name' => 'description', 'value' => $book->description])
        @include('shared.input', ['label' => 'Image de couverture', 'type' => 'file' , 'name' => 'cover_image', 'value' => $book->cover_image])
        @include('shared.input', ['label' => 'Contenu du Livre', 'type' => 'file' , 'name' => 'content_file', 'value' => $book->content_file])


        <div >
            <button class="btn btn-primary">
                @if ($book->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>


    </form>



@endsection
