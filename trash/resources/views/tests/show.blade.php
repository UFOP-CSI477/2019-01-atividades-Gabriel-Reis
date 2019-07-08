@extends('principal')

@section('titulo','Exibir Estado')

@section('conteudo')

	<p>Id: {{ $tests->id }}</p>
	<p>Paciente: {{ $tests->id }}</p>
	<p>Procedimento: {{ $tests->id }}</p>
	<p>Data: {{ $tests->id }}</p>

	{{-- Volta para a lsita de estados --}}
	<a href="{{ route('tests.index') }}">Voltar</a>

	{{-- Editar o estado corrente --}}
	<a href="{{ route('tests.edit',$tests->id) }}">Editar</a>

	{{-- Excluir o estado autal --}}
	<form method="post" action="{{ route('tests.destroy',$tests->id) }}" onsubmit="return confirm('cofirma exclusão do Teste?');">
		@csrf
		@method('DELETE')
		<input type="submit" value="Excluir">
	</form>

@endsection