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
