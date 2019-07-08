@extends('principal')

@section('titulo','Editar Procedimento')

@section('conteudo')

	<form method="post" action="{{ route('procedures.update', $procedures->id) }}">
		@csrf
		@method('PATCH')
		<p>Nome: <input type="text" name="nome" value="{{ $procedures->name }}"></p>
		<p>Preço: <input type="text" name="price" value="{{ $procedures->price }}"></p>
		<p>Paciente: <input type="text" name="paciente" value="{{ $procedures->user_id }}"></p>
		<input type="submit" name="btnSalvar" value="Incluir">
	</form>

@endsection