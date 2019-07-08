@extends('principal')

@section('titulo','Exibir Procedimento')

@section('conteudo')

	<br>
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
				<div class="card border-dark">
	                <div class="card-header bg-dark text-center text-light">
	                    <label>{{ $procedures->name }}</label>
	                </div>
	                <div class="card-body">
	                	<div class="list-group">
	                		<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">Preço: {{ $procedures->price }} </label>

							<label class="list-group-item d-flex justify-content-between align-items-center list-group-item-action list-group-item-secondary">Criador: 
								@foreach($users as $user)
									@if($procedures->user_id == $user->id)
										<td> {{ $user->name }} </td>
									@endif
								@endforeach
						</div>
					</div>
	                <div class="card-footer bg-secondary border-dark text-right">
	                	<div class="d-flex justify-content-end">
	                	<a class="btn btn-success btn-sm mr-2" role="button" aria-pressed="true" href={{ route('procedures.index') }}>Voltar</a>
	                	<a class="btn btn-info btn-sm mr-2" role="button" aria-pressed="true" href={{ route('procedures.edit',$procedures->id) }}>Editar</a>
	                	<?php
							$bool = True;
		                	foreach ($tests as $test)
		                		if ($test->procedure_id == $procedures->id)
									$bool = False;
	                	?>
	                	@if ($bool == True)
	                		<form id="logout-form" method="post" action="{{ route('procedures.destroy',$procedures->id) }}" onsubmit="return confirm('cofirma exclusão do exame?');">
								@csrf
								@method('DELETE')
								<input class="btn btn-danger btn-sm" type="submit" value="Excluir">
							</form>
						@endif
						
	                </div>
            	</div>
          	</div>
        </div>
	</div>
@endsection