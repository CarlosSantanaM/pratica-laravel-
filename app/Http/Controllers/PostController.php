<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    // Exibir todos os Posts
    public function index()
    {
        $posts = Post::all();  //Buscando todos os Posts do BD

        return view('home', compact('posts')); //Passando a variavel $posts para a view 'home'
    }

    // Exibir um form para criar Posts
    public function create()
    {
        return view('posts.create'); // Retornando a view com o form de criacao
    }

    // Salva o novo Post no banco de dados
    public function store(Request $request)
    {
        //Validando os Dados
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);



        // Criando o Post
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Associando o post ao usuario que esta logado

        // Salvando no BD
        $post->save();

        //Redirecionando para a home
        return redirect()->route('index.home')->with('success', 'Post criado com sucesso!');

    }

    //
    public function show(string $id)
    {
        //
    }

    // Exibir form de edicao de post ja existente
    public function edit(string $id)
    {
        //
    }

    // Atualizar post existente no banco de dados
    public function update(Request $request, string $id)
    {
        //
    }

    // deletar um post
    public function destroy(string $id)
    {
        //
    }
}
