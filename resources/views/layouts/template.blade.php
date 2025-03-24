<!-- resources/views/layouts/template.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Minha Aplicação')</title>
    @vite('resources/css/app.css')
</head>
<body>

    <!-- Condição para exibir o menu apenas se não estiver nas páginas de login ou registro -->
    @if(!request()->is('login') && !request()->is('register'))
        <!-- Menu do Cabeçalho -->
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
    @endif

    @yield('content')

    <script>
        // Função para alternar a visibilidade do menu de logout
        function toggleDropdown() {
            const dropdown = document.querySelector('.dropdown');
            dropdown.classList.toggle('open');
        }
    </script>

</body>
</html>
