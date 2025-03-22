@extends('layouts.template')

@section('content')
    <!-- Container principal da página -->
    <div class="home-container">
        <!-- Cabeçalho com informações do usuário -->
        <div class="header">
            @auth
                <div class="user-info">
                    <span class="username">{{ ucfirst(explode(' ', Auth::user()->name)[0]) }}</span>
                    <div class="dropdown">
                        <div class="menu-icon" onclick="toggleDropdown()">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="dropdown-content">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn">Sair</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <p>Você não está logado.</p>
            @endauth
        </div>

        <!-- Corpo da página -->
        <div class="content">
            <h1>Conteúdo da Página</h1>
            <p>Este é o conteúdo da página principal.</p>
        </div>
    </div>

    <script>
        // Função para alternar a visibilidade do menu de logout
        function toggleDropdown() {
            const dropdown = document.querySelector('.dropdown');
            dropdown.classList.toggle('open');
        }
    </script>
@endsection
