@extends('principal')

@section('titulo', 'Estados')

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
{{-- 			<th>Editar</th> --}}
		</tr>
		</thead>

		@foreach($procedures as $p)
			<tr>
				<td> {{ $p->id }} </td>
				<td> {{ $p->name }} </td>
				<td> {{ $p->price }} </td>
				<td> {{ $p->user_id }} </td>
				{{-- <td><a href="{{route('estados.show',$e->id)}}">Exibir</a></td> --}}
			</tr>
		@endforeach

	</table>

	</div>
	

@endsection