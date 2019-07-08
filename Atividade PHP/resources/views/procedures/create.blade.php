@extends('principal')

@section('titulo', 'Inserir Estado')

@section('conteudo')
	
	<form method="post" action="{{ route('procedures.store') }}">

		@csrf
		
		<P>Nome: <input type="text" name="name"></P>
		<P>Preço: <input type="number" name="price"></P>
		<P>Paciente: <input type="number" name="user_id" ></P>

		<input type="submit" name="btnSalvar" value="Incluir">

	</form>

@endsection