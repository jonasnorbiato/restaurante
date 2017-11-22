<!DOCTYPE html>
<html>
<head>
	<title>Flores</title>

	<link rel="icon" href="{{asset('img/flores.png')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">  
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/releway.css')}}">  
	<link rel="stylesheet" href="{{asset('css/layout.css')}}">    
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('js/js_projeto.js') }}"></script>
	<script  src="{{asset('js/bootstrap.min.js')}}"></script>
	

</head>
<body class="body">
	<header>
	<div class="container">
		<div class="row">
	
			<div class="col-xs-6 col-sm-3 col-md-4 col-lg-3 titulo">
					<a href="{{url('/')}}" class="altura" ><img src="{{asset('img/botao3.png')}}" class="altura" alt=""></a>
			</div>
			<div class=" col-sm-1 col-md-1 col-lg-1 "> 
			</div>
			<div class="col-xs-6 col-sm-8 col-md-7 col-lg-8 "> 
			<br>
				<h2 class="titulo">Flores e Sabores</h2>
           
			</div>
			
		</div>
	</div>
</header>
<br>
<div class="container">
	<div class="row">
		
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2 menu">
			
				<nav class="navbar navbar-default" >						
					<ul class="nav nav-pills nav-stacked">
						<!-- professor -->
						<li><a href="{{url('/')}}">Mesa</a>	</li>
						<li><a href="{{url('/visualizar/vendas')}}">Vendas Realizadas</a>	</li>        
						 <li>
					          <a href="#" data-toggle="collapse" data-target="#toggle3" data-parent="#sidenav01" class="collapsed">
					          <span></span> Garçom<span class="caret"></span>
					          </a>
					          <div class="collapse" id="toggle3" style="height: 0px;">
					            <ul class="nav nav-list submenu">
					              <li><a href="{{url('/cadastrar/garcom')}}">Cadastrar</a></li>

					              <li><a href="/visualizar/garcom">Visualizar</a></li>				          
					            </ul>
					          </div>
					    </li>
					</ul>
				</nav>
			
		</div>



		<!-- conteudo de cada view -->
		<div  class="col-xs-12 col-sm-12 col-md-9 col-lg-9 index_corpo">
			
			
			@yield('content')
			

		</div>
				
		<div class="col-lg-1"> 
	
		</div>
		
	</div>	
	
</div>
</body>
</html>