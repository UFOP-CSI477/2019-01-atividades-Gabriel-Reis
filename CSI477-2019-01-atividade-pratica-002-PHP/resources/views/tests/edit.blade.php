@extends('principal')

@section('titulo','Editar Exame')

@section('conteudo')

	<br>
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
				<div class="card border-dark">
	                <div class="card-header bg-dark text-center text-light">
	                    Atualizar Exame
	                </div>
	                <div class="card-body">
	                    <form method="post" action="{{ route('tests.update', $test->id) }}">
							@csrf @method('PATCH')
							<div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-3 col-form-label">Paciente</label>
	                            <div class="col-sm-9">
	                            	@foreach($users as $user)
							            @if ( $test->user_id == $user->id)
	     									
	     									@if(Auth::user()->type!=1)
	     										<input class="form-control" id ="name" type="text" name="name" disabled value="{{$user->name}}">
	     									@else
	     										<select class="form-control" name="user_id">
													@foreach($users as $user)
											            @if (Auth::user()->id == $user->id)
											               	<option value="{{ $user->id }}"selected> {{ $user->name }}</option>
											            @else
											               	<option value="{{ $user->id }}"> {{ $user->name }}</option>
											           @endif
											        @endforeach
											       </select>
	     									@endif
							            @endif
							        @endforeach
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-3 col-form-label">Exame</label>
	                            <div class="col-sm-9">
	     							<select class="form-control" name="procedure_id">
							            @foreach($procedures as $p)
							            	<option value="{{ $p->id }}"
							                @if ( $test->procedure_id == $p->id)
							                	selected
							                @endif  
							                > {{ $p->name }}</option>
							            @endforeach
							        </select>
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-3 col-form-label">Data</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="name" type="date" name="date" value={{ $test->date }}>
	   	 						</div>
	                        </div>
	                </div>
	                <div class="card-footer bg-secondary border-dark text-right">
	                	<div class="float-right">
	                		<a class="btn btn-success btn" role="button" aria-pressed="true" href={{route('tests.show', $test->id )}}>Voltar</a>
							<input class="btn btn-primary" type="submit" name="btnSalvar" value="Atualizar">
							</form>
						</div>
	                </div>
            	</div>
          	</div>
        </div>
	</div>

@endsection