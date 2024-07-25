@extends('base')

@section('title', 'Se connecter')

@section('content')

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="container mt-4">

        <h2>@yield('title')</h2>

        <form action="{{ route('login') }}" method="post" class="vstack gap-2">
            @csrf

            @include('shared.input', ['label' => 'Email' , 'name' => 'email', 'type' => 'email', 'class' => 'col'])
            @include('shared.input', ['label' => 'Mot de passe' , 'name' => 'password', 'type' => 'password', 'class' => 'col'])
            <div>
                <button class="btn btn-primary">
                    Se connecter
                </button>
            </div>
        </form>
    </div>


@endsection