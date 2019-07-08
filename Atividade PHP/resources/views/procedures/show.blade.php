@extends('principal')

@section('titulo','Exibir Estado')

@section('conteudo')

	<p>Id: {{ $procedures->id }} </p>
	<p>Nome: {{ $procedures->name }} </p>
	<p>Preço: {{ $procedures->price }} </p>
	<p>Paciente: {{ $procedures->user_id }} </p>

	{{-- Volta para a lsita de estados --}}
	<a href="{{ route('procedures.index') }}">Voltar</a>

	{{-- Editar o estado corrente --}}
	<a href="{{ route('procedures.edit',$procedures->id) }}">Editar</a>

	{{-- Excluir o estado autal --}}
	<form method="post" action="{{ route('procedures.destroy',$procedures->id) }}" onsubmit="return confirm('cofirma exclusão do procedimento?');">
		@csrf
		@method('DELETE')
		<input type="submit" value="Excluir">
	</form>

@endsection