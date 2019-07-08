@extends('principal')

@section('titulo','Editar Procedimento')

@section('conteudo')
	
	<br>
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
				<div class="card border-dark">
	                <div class="card-header bg-dark text-center text-light">
	                    Atualizar Procedimento
	                </div>
	                <div class="card-body">
	                    <form method="post" action="{{ route('procedures.update', $procedure->id) }}">
							@csrf @method('PATCH')
							<div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-2 col-form-label">Nome</label>
	                            <div class="col-sm-10">
	     							<input class="form-control" id ="name" type="text" name="name" value={{ $procedure->name }}>
	   	 						</div>
	                        </div>
	                        <div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-2 col-form-label">Nome</label>
	                            <div class="col-sm-10">
	     							<input class="form-control" id ="price" type="text" name="price" value={{ $procedure->price }}>
	   	 						</div>
	                        </div>
	                </div>
	                <div class="card-footer bg-secondary border-dark text-right">
	                	<div class="float-right">
	                		<a class="btn btn-success btn active" role="button" aria-pressed="true" href={{route('procedures.show', $procedure->id )}}>Voltar</a>
							<input class="btn btn-primary" type="submit" name="btnSalvar" value="Atualizar">
							</form>
						</div>
	                </div>
            	</div>
          	</div>
        </div>
	</div>


@endsection