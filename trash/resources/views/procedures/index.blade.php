@extends('principal')

@section('titulo', 'Procedimentos')

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">
		
		<a href="{{ route('procedures.create') }}">Inserir procedimento</a>

		<table class="table table-striped table-bordered table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Preço</th>
			<th>Paciente</th>
			<th>Editar</th>
		</tr>
		</thead>

		@foreach($procedures as $proc)
			<tr>
				<td> {{ $proc->id }} </td>
				<td> {{ $proc->name }} </td>
				<td> {{ $proc->price }} </td>
				<td> {{ $proc->user_id }} </td>
				<td><a href="{{route('procedures.show', $proc->id )}}">Editar</a></td>
			</tr>
		@endforeach

	</table>

	</div>
	

@endsection