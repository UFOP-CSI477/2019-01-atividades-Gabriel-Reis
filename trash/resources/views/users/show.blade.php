@extends('principal')

@section('titulo','Exibir Estado')

@section('conteudo')

	<p>Id: {{ $users->id }} </p>
	<p>Nome: {{ $users->name }}></p>
	<p>Email: {{ $users->email }}></p>
	<p>Nível de permissão: {{ $users->type }}></P>

	{{-- Volta para a lsita de estados --}}
	<a href="{{ route('users.index') }}">Voltar</a>

	{{-- Editar o estado corrente --}}
	<a href="{{ route('users.edit',$users->id) }}">Editar</a>

	{{-- Excluir o estado autal --}}
	<form method="post" action="{{ route('users.destroy',$users->id) }}" onsubmit="return confirm('cofirma exclusão do Usuário?');">
		@csrf
		@method('DELETE')
		<input type="submit" value="Excluir">
	</form>

@endsection