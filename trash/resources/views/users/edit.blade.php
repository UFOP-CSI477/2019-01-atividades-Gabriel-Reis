@extends('principal')

@section('titulo','Editar usuário')

@section('conteudo')

	<form method="post" action="{{ route('users.update', $users->id) }}">
		@csrf
		@method('PATCH')
		<p>Nome: <input type="text" name="name" value="{{ $users->name }}"></p>
		<p>Email: <input type="text" name="email" value="{{ $users->email }}"></p>
		<p>Senha: <input type="password" name="password" value="{{ $users->password }}"></p>
		<p>Lembrete de senha: <input type="number" name="remember_token" value="{{ $users->remember_token }}"></P>
		<p>Nível de permissão: <input type="number" name="type" value="{{ $users->type }}"></P>

		<input type="submit" name="btnSalvar" value="Incluir">
	</form>

@endsection