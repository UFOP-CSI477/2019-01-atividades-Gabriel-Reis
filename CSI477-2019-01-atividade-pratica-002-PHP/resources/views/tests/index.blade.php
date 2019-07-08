@extends('principal')

@section('titulo', 'Exame')

@section('conteudo')
	
	<div class="p-3 mb-2 container mt-4">

		<table class="table table-striped table-bordered table-hover table-sm table-responsive-sm">
		<thead class="thead-dark">
		<tr>
			<th>Paciente</th>
			<th>Procedimento</th>
			<th>Preço</th>
			<th>Data</th>
			<th>Visualizar</th>
		</tr>
		</thead>

		@foreach($tests as $p)
			@if($p->user_id == Auth::user()->id || Auth::user()->type == 1)
				<tr>
					@foreach($users as $user)
						@if($p->user_id == $user->id)
							<td> {{ $user->name }} </td>
						@endif
					@endforeach
					@foreach($procedures as $proc)
						@if($p->procedure_id == $proc->id)
							<td> {{ $proc->name }} </td>
							<td> {{ $proc->price }} </td>
							@php
								$price = $price + $proc->price;
								$count = $count + 1;
							@endphp
						@endif
					@endforeach
					<td> {{ $p->date }} </td>
					<td><a href="{{route('tests.show',$p->id)}}">Visualizar</a></td>
				</tr>
			@endif
		@endforeach
		
		<tfoot>
			<tr>
				<td colspan="4" class="bg-dark text-white font-weight-bold">
					Total de exames:
				</td>
				<td colspan="1" class="bg-dark text-white text-right font-weight-bold">
					{{$count}}	
				</td>
			</tr>
			<tr>
				<td colspan="4" class="bg-dark text-white font-weight-bold">
					Preço Total: 
				</td>
				<td colspan="1" class="bg-dark text-white text-right font-weight-bold">
					{{$price}}
				</td>
			</tr>
		</tfoot>

		</table>
		
		<div class="float-right">
			<a class="btn btn-dark btn-lg active" role="button" aria-pressed="true" href={{ route('tests.create') }}>Inserir teste</a>
		</div>

	</div>
	

@endsection