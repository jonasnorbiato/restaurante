@extends ('layouts.layout')

@section('content')
	<h2 class="titulo_boby">Editar Garçom</h2>

	<form action="{{url('/inserir/garcon', $garcon->NR_GARCON)}}" method="post">
		{{ csrf_field() }}
		<input type="text" class="form-control" name="nome" value="{{$garcon->NOME}}">
		<br>
		<button type="submit" class="btn btn-primary pull-right">
			<i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i>
		</button>
	</form>
	
	<br><br><br>
	@if(Session::has('sucesso'))
    		<div class="alert alert-success alert-dismissible">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<i class="fa fa-check" aria-hidden="true"></i>
	    			{!! session('sucesso') !!}

	    	</div>
		@endif
		@if (count($errors))
			<div class="alert alert-danger alert-dismissible">
					 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>


    			@foreach($errors->all() as $erro)
						<i class="fa fa-times" aria-hidden="true"></i>
						{{ $erro }}
					<br>
    			@endforeach
			</div>
   		 @endif

@endsection