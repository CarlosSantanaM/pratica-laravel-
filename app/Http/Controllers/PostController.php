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
        $post = Post::findOrFail($id); // Encontra o post pelo ID ou ira retornar 404 caso nao encontre

        if( $post->user_id !== Auth::id()) {
            // Se o post no for do usuario retorna msg de erro
            return redirect()->route('index.home')->with('error', ' Voce nao tem permissao para editar esse post');
        }

        return view('posts.edit', compact('post')); // Retorna a view com o post
    }

    // Atualizar post existente no banco de dados
    public function update(Request $request, string $id)
    {
        // Validando o form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id); // Encontra o post a ser att
        $post->title = $request->title; // Att o titulo
        $post->content = $request->content; // Att o conteudo
        $post->save(); // Salva no banco de dados

        return redirect()->route('index.home')->with('success', 'Post atualizado com sucesso!');
    }

    // deletar um post
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id); // Encontrar post pelo ID

        //Verifica se o usuario logado e o dono do post
        if($post->user_id !== Auth::id()){
            // Se nao for, redirect de volta com msg de erro
            return redirect()->route('index.home')->with('error', 'Voce nao tem permissao para excluir este post');
        }

        $post->delete(); // Deleta o post

        return redirect()->route('index.home')->with('seccess', 'Post deletado com sucesso');
    }
}
