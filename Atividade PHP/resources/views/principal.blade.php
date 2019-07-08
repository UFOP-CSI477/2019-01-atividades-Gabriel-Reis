<!DOCTYPE html>
<html>
<head>
	<title>@yield('titulo', 'Sistema Acadêmico')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  		<a href="#" class="navbar-brand">Anáslises laboratoriais</a>

  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal">
  			<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="menuPrincipal">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item"> 
					<a class="nav-link" href="/home">Home</a> 
				</li>
				<li class="nav-item"> 
					<a class="nav-link" href="/procedures">Procedimentos</a> 
				</li>
				<li class="nav-item"> 
					<a class="nav-link" href="/home">Pacientes</a> 
				</li>
				<li class="nav-item"> 
					<a class="nav-link" href="/home">Adiministradores</a> 
				</li>
			</ul>
		</div>

	</nav>


	{{-- Notificações --}}
	@if( Session::has('mensagem') )
		<p><strong>{{ Session::get('mensagem') }}</strong></p>
	@endif
	

	{{-- Conteúdo - parte central --}}

	@yield('conteudo')	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>