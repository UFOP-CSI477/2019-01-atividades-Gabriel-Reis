@extends('principal')

@section('titulo', 'Inserir Procedimento')

@section('conteudo')
	
	<br>
		
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
				<div class="card border-dark">
	                <div class="card-header bg-dark text-center text-light">
	                    Inserir Procedimento
	                </div>
	                <div class="card-body">
	                    <form method="POST" action="{{ route('procedures.store') }}">
	                        @csrf
	                        <div class="form-group row align-items-center">
	                            <label for="name" class="col-sm-2 col-form-label">Nome</label>
	                            <div class="col-sm-10">
	     							<input class="form-control" id ="name" type="text" name="name" id="name">
	   	 						</div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="price" class="col-sm-2 col-form-label">Preço</label>
	                            <div class="col-sm-10">
	     							<input class="form-control" type="number" name="price" id="price">
	   	 						</div>
	                        </div>
	                </div>
	                <div class="card-footer bg-secondary border-dark text-right">
	                	<div class="float-right">
	                		<a class="btn btn-info btn" role="button" aria-pressed="true" href={{route('procedures.index')}}>Voltar</a>
	                    	<button type="submit" class="btn btn-success">Inserir</button>
	                    	</form>
						</div>
	                </div>
            	</div>
          	</div>
        </div>
	</div>
	

@endsection