@extends('layouts.template')
@section('content')

<!-- Formulario de Cadastro -->
<form action="{{ route('user.register') }}" method="POST" class="form-register">
    @csrf

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif

    <div class="form-group">
        <label for="nome" class="form-label">Nome:</label>
        <input class="form-input" name="nome" id="nome" placeholder="Digite seu nome">
    </div>

    <div class="form-group">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" name="email" id="email" class="form-input" value="{{ old('email') }}" placeholder="Digite seu E-mail">
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Senha:</label>
        <input type="password" name="password" id="password" class="form-input" placeholder="Digite sua senha">
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="form-label">Confirme a Senha:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirme sua senha">
    </div>

    <div class="form-group">
        <button type="submit" class="form-button">Entrar</button>
    </div>

    <div class="form-group">
        <h3>Já tem cadastro? <a class="form-link" href="{{ route('user.login') }}">Logar</a></h3>
    </div>
</form>

@endsection
