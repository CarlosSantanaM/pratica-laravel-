@extends('layouts.template')

@section('content')

    <div class="edit-post-form">
        <h2>Editar Post</h2>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="content">Conteúdo</label>
                <textarea name="content" class="form-input" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>

@endsection
