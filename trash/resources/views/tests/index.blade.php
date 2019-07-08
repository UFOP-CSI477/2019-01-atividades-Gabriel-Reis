@extends('principal')

@section('titulo', 'Estados')

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">

		<a href="{{ route('tests.create') }}">Inserir teste</a>

		<table class="table table-striped table-bordered table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			<th>Id</th>
			<th>Paciente</th>
			<th>Procedimento</th>
			<th>Data</th>
			<th>Editar</th>
		</tr>
		</thead>

		@foreach($tests as $p)
			<tr>
				<td> {{ $p->id }} </td>
				<td> {{ $p->user_id }} </td>
				<td> {{ $p->procedure_id }} </td>
				<td> {{ $p->date }} </td>
				<td><a href="{{route('tests.show',$p->id)}}">Exibir</a></td>
			</tr>
		@endforeach

	</table>

	</div>
	

@endsection