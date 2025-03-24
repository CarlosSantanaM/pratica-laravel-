@extends('layouts.template')

@section('content')


        <!-- Corpo da página -->
        <div class="content">
            <h1>Conteúdo da Página</h1>
            <p>Este é o conteúdo da página principal.</p>
            <h1>Lista de Posts</h1>

        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <p><strong>Autor:</strong> {{ $post->user->name ?? 'Desconhecido' }}</p>
            </div>
            <hr>
        @endforeach
        </div>
    </div>



@endsection
