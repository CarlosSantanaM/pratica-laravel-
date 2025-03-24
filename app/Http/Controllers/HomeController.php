<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Obtendo o usuário autenticado
        $posts = Post::all(); // Busca todos os posts

        return view('home', compact('user', 'posts')); // Passa ambas as variáveis para a view
    }
}
