@extends('principal')

@section('titulo', 'Usuários')

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">

		<table class="table table-striped table-bordered table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Tipo</th>
			<th>Editar</th>
		</tr>
		</thead>

		@foreach($user as $p)
			<tr>
				<td> {{ $p->name }} </td>
				<td> {{ $p->email }} </td>
				@if($p->type==1)
					<td> Administrador </td>
				@elseif ($p->type==2)
						<td> Operador </td>
				@elseif ($p->type==3)
						<td> Paciente </td>
				@endif
				<td><a href="{{route('users.show',$p->id)}}">Exibir</a></td>
			</tr>
		@endforeach

	</table>

		<div class="float-right">
			<a class="btn btn-dark btn-lg active" role="button" aria-pressed="true" href={{ route('users.create') }}>Inserir usuário</a>
		</div>

	</div>

@endsection