@extends('principal')

@section('titulo','Editar usuário')

@section('conteudo')
		
	<br>
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-7">
				<div class="card border-dark">
	                <div class="card-header bg-dark text-center text-light">
	                    Editar Usuário
	                </div>
	                <div class="card-body">
	                    <form method="post" action="{{ route('users.update', $user->id) }}">
							@csrf @method('PATCH')
							<div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-3 col-form-label">Nome</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="name" type="text" name="name" value="{{$user->name}}">	
	     						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-3 col-form-label">Email</label>
	                            <div class="col-sm-9">
	                            	<input class="form-control" id ="email" type="text" name="email" value="{{ $user->email }}">	
	                            </div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-3 col-form-label">Senha</label>
	                            <div class="col-sm-9">
	     							<input class="form-control" id ="password" type="password" name="password">
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-3 col-form-label">Nível de permissão</label>
	                            <div class="col-sm-9">
	                            	<select class="form-control" name="type">
								    	<option value="1"
	                            			@if($user->type==1)
								    			selected
								    		@endif
								    	 >Administrador</option>
								    	 <option value="2"
	                            			@if($user->type==2)
								    			selected
								    		@endif
								    	 >Operador</option>
								    	 <option value="3"
	                            			@if($user->type==3)
								    			selected
								    		@endif
								    	 >Paciente</option>
	                            	</select>
	   	 						</div>
	                        </div>
	                </div>
	                <div class="card-footer bg-secondary border-dark text-right">
	                	<div class="float-right">

	                		<a class="btn btn-success btn" role="button" aria-pressed="true" href={{route('users.show', $user->id )}}>Voltar</a>
							<input class="btn btn-primary" type="submit" name="btnSalvar" value="Editar">
						</form>
						</div>
	                </div>
            	</div>
          	</div>
        </div>
	</div>
@endsection