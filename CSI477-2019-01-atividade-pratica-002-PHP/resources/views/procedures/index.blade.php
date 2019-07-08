@extends('principal')

@section('titulo', 'Procedimentos')

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">
		
		<table class="table table-striped table-bordered table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			<th>Nome</th>
			<th>Preço</th>
			<th>Resposável</th>
			<th>Visualizar</th>
		</tr>
		</thead>

		@foreach($procedures as $proc)
			<tr>
				<td> {{ $proc->name }} </td>
				<td> {{ $proc->price }} </td>
				@foreach($users as $user)
					@if($proc->user_id == $user->id)
						<td> {{ $user->name }} </td>
					@endif
				@endforeach
				<td><a href="{{route('procedures.show', $proc->id )}}">Visualizar</a></td>
			</tr>
		@endforeach

	</table>

	<div class="float-right">
		<a class="btn btn-dark btn-lg active" role="button" aria-pressed="true" href={{ route('procedures.create') }}>Inserir procedimento</a>
	</div>

	</div>
	

@endsection