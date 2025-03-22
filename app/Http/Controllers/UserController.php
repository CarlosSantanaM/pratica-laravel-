<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // ✅ Importação correta do Hash
use Illuminate\Support\Facades\Auth; //✅ Importação correta do Auth


class UserController extends Controller
{


    // Mostrar tela de Login
    public function showLogin(){
        return view('user.login');
    }

    // Autenticacao de Login
    public function login(Request $request) {

        //Validar campos
        $request->validate([
            'email' => 'required | email', // email obrigatorio
            'password' => 'required', // Senha obrigatorio
        ]);

        // Tentar autenticar/logar usuario
        $credentials = $request->only('email', 'password'); // Recupera email e senha do request

        if (Auth::attempt($credentials)) {
            return redirect()->route('index.home'); // Redireciona para home se logado
        }

        // Se a autenticação falhar, mostra erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    // Mostrar tela de registro
    public function showregister(){
        return view('user.register');
    }

    // Criacao de Usuarios
    public function register(Request $request) {
    //Validacao dos dados do formulario
    $request->validate([
        'nome' => 'required|string|max:255', // Obrigatorio / Seja texto / Maximo de 255 caracteres
        'email' => 'required|email|unique:users,email', // Obrigatorio / Seja um email  / Valida se na tabela users do BD ja existe o email caso exista retorna erro
        'password' => 'required|min:6|confirmed', // Obrigatorio / Minimo de 6 caracteres / Faz uma validacao com o campo do form "password_confirmation", para ver se tem o mesmom valor
    ]);

    // Criar Usuario no Banco de dados
    $user = User::create([
        'name' => $request->nome,  //Pegando no request os campos do input e jogando no BD
        'email' => $request->email,
        'password' => Hash::make($request->password), //Criptografando a senha
    ]); // ✅ Adicionado ponto e vírgula corretamente

    //Autenticar/Logar Usuario automaticamente
    //Auth::login($user);

    //Redirecionar Usuario para home/pagina principal
    return redirect()->route('user.register')->with('success', 'Cadastro realizado com sucesso!'); // ✅ Corrigido 'sucess' para 'success'

    }

}
