@extends('layouts.template')

@section('content')

<!-- Botão para criar um novo post -->
<a href="{{ route('posts.create') }}" class="create-post-btn">
    <span class="plus-icon">+</span> Criar Post
</a>

<!-- Corpo da página -->
<div class="content">
    <h1 class="feed-title">Feed</h1>

    @if ($posts->isEmpty())
        <p>Nenhum Post foi publicado ainda.</p>
    @else
        @foreach ($posts as $post)
            <div class="post-item">
                <h2 class="post-author">{{ explode(' ', $post->user->name)[0] ?? 'Desconhecido' }}</h2>
                <h3 class="post-title">{{ $post->title }}</h3>
                <p class="post-content">{{ $post->content }}</p>

                <!-- Verifica se o post é do usuário logado -->
                @if ($post->user_id === Auth::id())
                    <div class="post-actions">
                        <!-- Icone para editar o post -->
                        <a href="{{ route('posts.edit', $post->id) }}" class="edit-btn">
                            <span class="edit-icon">✏️</span>
                        </a>

                        <!-- Formulário para deletar o post -->
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Tem certeza que deseja excluir este post?');">
                                <span class="delete-icon">🗑️</span>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <hr>
        @endforeach
    @endif

    <!-- verificar se existe msg de success na sessão -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection

