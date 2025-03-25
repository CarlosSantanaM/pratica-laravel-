@extends('layouts.template')

@section('content')


        <!-- Corpo da página -->
        <div class="content">
            <h1>Lista de Posts</h1>

            @if ($posts->isEmpty())
                <p>Nenhum Post foi publicado ainda.</p>
            @else
                @foreach ($posts as $post)
                    <div>
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->content }}</p>
                        <p><strong>Autor:</strong> {{ $post->user->name ?? 'Desconhecido' }}</p>

                        <!-- Verifica se o post é do usuário logado -->
                        @if ($post->user_id === Auth::id())
                            <!-- Link para editar o post, se for do usuário logado -->
                            <a href="{{ route('posts.edit', $post->id) }}">Editar</a>
                        @endif
                    </div>
                    <hr>
                @endforeach
            @endif

            <!-- verificar se existe msg de success na sessao -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif



        </div>
    </div>



@endsection
