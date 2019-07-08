@extends('principal')

@section('titulo', 'Usuários')

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">
		
		<a href="{{ route('users.create') }}">Inserir usuário</a>

		<table class="table table-striped table-bordered table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			{{-- name	email	password	type	remember_token --}}
			<th>Id</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Tipo</th>
			<th>Editar</th>
		</tr>
		</thead>

		@foreach($users as $p)
			<tr>
				<td> {{ $p->id }} </td>
				<td> {{ $p->name }} </td>
				<td> {{ $p->email }} </td>
				<td> {{ $p->type }} </td>
				<td><a href="{{route('users.show',$p->id)}}">Exibir</a></td>
			</tr>
		@endforeach

	</table>

	</div>
	

@endsection