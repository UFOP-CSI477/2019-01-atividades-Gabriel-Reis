@extends('principal')

@section('titulo', 'Inserir Estado')

@section('conteudo')
	
	<form method="post" action="{{ route('tests.store') }}">

		@csrf
		
		{{-- user_id	procedure_id	date --}}

		<p>Paciente: <input type="number" name="user_id"></p>
		<p>Procedimento: <input type="number" name="procedure_id"></p>
		<p>Data: <input type="date" name="date"></p>

		<input type="submit" name="btnSalvar" value="Incluir">

	</form>

@endsection