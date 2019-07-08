<?php

// PARA CRIAR UMA CONTROLER :
// php artisan make:controller PaginasController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function index(){
    	$nome = "Gabiel-Reis";
    	return 	view('home') -> with('nome', $nome);
	}
}
