@extends('layouts.template')

@section('content')


<!-- resources/views/posts/create.blade.php -->
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="content">Conteúdo</label>
        <textarea name="content" id="content" required></textarea>
    </div>
    <button type="submit">Criar Post</button>
</form>


@endsection
