<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        $user = Auth::user(); // Obtendo o usuario cadastrado

        return view('home', compact('user')); // Passando a variavel $user com o usuario cadastrado para home.blade.php
    }
}
