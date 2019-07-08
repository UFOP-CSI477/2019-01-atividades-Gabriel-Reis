@extends('principal')

@section('titulo', 'Inserir Exame')

@section('conteudo')
	
	<br>
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
				<div class="card border-dark">
	                <div class="card-header bg-dark text-center text-light">
	                    Inserir Exame
	                </div>
	                <div class="card-body">
	                    <form method="POST" action="{{ route('tests.store') }}">
	                        @csrf
	                        <div class="form-group row align-items-center">
	                            <label for="paciente" class="col-sm-3 col-form-label">Paciente</label>
	                            <div class="col-sm-9">
	                            	@if(Auth::user()->type == 1)
	                            		<select class="form-control" name="user_id">
										@foreach($users as $user)
								            @if (Auth::user()->id == $user->id)
								               	<option value="{{ $user->id }}"selected> {{ $user->name }}</option>
								            @else
								               	<option value="{{ $user->id }}"> {{ $user->name }}</option>
								           @endif
								        @endforeach
								    @else
								    	@foreach($users as $user)
								            @if (Auth::user()->id == $user->id)
								               	<input class="form-control" type="text" name="name" id="price" disabled value="{{ $user->name}}">
								           @endif
								        @endforeach
								    @endif
								    </select>
	   	 						</div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="price" class="col-sm-3 col-form-label">Exame</label>
	                            <div class="col-sm-9">
	                            	<select class="form-control" name="procedure_id">
		     							@foreach($procedures as $proc)
									        @if (Auth::user()->id == $proc->id)
									           	<option value="{{ $proc->id }}"selected> {{ $proc->name }}</option>
									        @else
									            <option value="{{ $proc->id }}"> {{ $proc->name }}</option>
									        @endif
									    @endforeach
									</select>
	   	 						</div>
	                        </div>

	                        <div class="form-group row">
	                            <label for="date" class="col-sm-3 col-form-label">Data</label>
	                            <div class="col-sm-9">
	                            	<input class="form-control" type="date" name="date" id="date">
	   	 						</div>
	                        </div>
	                </div>
	                <div class="card-footer bg-secondary border-dark text-right">
	                	<div class="float-right">
	                    	<a class="btn btn-info" role="button" aria-pressed="true" href={{route('tests.index')}}>Voltar</a>
	                    	<button type="submit" class="btn btn-success">Inserir</button>
	                    </form>
						</div>
	                </div>
            	</div>
          	</div>
        </div>
	</div>

@endsection