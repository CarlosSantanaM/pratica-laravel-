@extends('layouts.template')

@section('content')

<!-- resources/views/posts/create.blade.php -->
<form action="{{ route('posts.store') }}" method="POST" class="create-post-form">
    @csrf
    <h2>Criar Novo Post</h2>
    <div class="form-group">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="content">Conteúdo</label>
        <textarea name="content" id="content" class="form-input" required></textarea>
    </div>
    <button type="submit">Criar Post</button>
</form>

@endsection
