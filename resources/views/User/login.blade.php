@extends('layouts.template')
@section('content')

<!-- Formulario de Login -->
<form action="{{ route('user.login') }}" method="POST" class="form-login">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" name="email" id="email" class="form-input" value="{{ old('email') }}" placeholder="Digite seu E-mail">
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Senha:</label>
        <input type="password" name="password" id="password" class="form-input" placeholder="Digite sua senha">
    </div>

    <div class="form-group">
        <button type="submit" class="form-button">Entrar</button>
    </div>

    <div class="form-group">
        <h3>Ainda não tem cadastro? <a class="form-link" href="{{ route('user.register') }}">Cadastre-se</a></h3>
    </div>
</form>

@endsection
