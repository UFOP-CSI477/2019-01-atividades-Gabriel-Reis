@extends('principal')

@section('titulo', 'Inserir Usuário')

@section('conteudo')
	
	<form method="post" action="{{ route('users.store') }}">

		@csrf
		{{-- name	email	password	type	remember_token --}}
		<p>Nome: <input type="text" name="name"></p>
		<p>Email: <input type="text" name="email"></p>
		<p>Senha: <input type="password" name="password" ></p>
		<p>Lembrete de senha: <input type="number" name="remember_token" ></P>
		<p>Nível de permissão: <input type="number" name="type" ></P>

		<input type="submit" name="btnSalvar" value="Incluir">

	</form>

@endsection