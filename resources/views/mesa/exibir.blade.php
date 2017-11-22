@extends ('layouts.layout')

@section('content')
	<h3 class="titulo_boby">Mesas</h3>
	@if(Session::has('sucesso'))
    		<div class="alert alert-success alert-dismissible">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<i class="fa fa-check" aria-hidden="true"></i>
	    			{!! session('sucesso') !!}

	    	</div>
		@endif
	<br>
	@foreach($mesas as $mesa)
		<a href="{{url('/realizar/pedido',$mesa->NR_MESA)}}" class="mesa"><img class="" src="{{asset('img/mesa.png')}}" alt="">{{$mesa->NR_MESA}}</a>
	@endforeach

@endsection