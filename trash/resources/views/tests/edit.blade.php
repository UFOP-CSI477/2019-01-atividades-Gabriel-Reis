@extends('principal')

@section('titulo','Editar Estado')

@section('conteudo')

	<form method="post" action="{{ route('tests.update', $tests->id) }}">
		@csrf
		@method('PATCH')
		<p>Paciente: <input type="number" name="user_id" value="{{ $tests->user_id }}"></p>
		<p>Procedimento: <input type="number" name="procedure_id" value="{{ $tests->procedure_id }}"></p>
		<p>Data: <input type="text" name="date"  value="{{ $tests->date }}"></p>
		<input type="submit" name="btnSalvar" value="Incluir">
	</form>

@endsection