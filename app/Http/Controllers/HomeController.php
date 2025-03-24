<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        //$user = Auth::user(); // Obtendo o usuário autenticado

        //return view('home', compact('user')); // Passa a variável para a view
    }
}
