<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //
    }

    // Salva o novo Post no banco de dados
    public function store(Request $request)
    {
        //
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
