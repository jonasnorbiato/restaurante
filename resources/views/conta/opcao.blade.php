@extends ('layouts.layout')

@section('content')
<h2 class="titulo_boby"> Mesa {{$nr_mesa}} </h2>

	<div class="col-xs-12">
	  @if(Session::has('sucesso'))
	    		<div class="alert alert-success alert-dismissible">
				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    			<i class="fa fa-check" aria-hidden="true"></i>
		    			{!! session('sucesso') !!}

		    	</div>
			@endif
	</div>

<br>

<div class="col-xs-3 col-xs-offset-1">
	<form action="{{url('/cadastrar/pedido', $conta[0]->NR_CONTA)}}" method="post">
		{{ csrf_field() }}
		<button class="btn btn-default" type="submit"><h4>Efetuar Pedido</h4></button>
		
	</form>
</div>	

<div class="col-xs-3">
		<form action="{{url('/fechar/conta', $conta[0]->NR_CONTA)}}" method="post">	
		{{ csrf_field() }}
		<button class="btn btn-default" type="submit"><h4>Fechar Venda</h4></button>
	</form>
	<br>
</div>


<div class="col-xs-3">
		<form action="{{url('/cancelar/venda', $conta[0]->NR_CONTA)}}" method="get">	
	
		<button class="btn btn-default btn-apagar" type="submit"><h4>Cancelar Venda</h4></button>
	</form>
	<br>
</div>

<div class="xol-xs-12">

	<table class="table table-striped table-hover tabela">			
			<thead>
				<tr>
					<th class="titulo_teste">
						PRODUTO
					</th>
					<th>
						PREÇO
					</th>
					<th class="">
						QUANTIDADE
					</th>
					<th class="">
						PREÇO TOTAL
					</th>
					<th>
						
					</th>
				</tr>
			</thead>
			<tbody>
					@foreach($pedidos as $pedido)
				<tr>
					<td>
						{{$pedido->itemcardapio->NOME}}
					</td>
					<td>
						{{$pedido->itemcardapio->PRECO}}
					</td>
					<td class="">
						{{$pedido->QUANTIDADE}}
					</td>
					<td>
						{{$pedido->PRECO_UNITARIO}}
					</td>
					<td>
						<a href="{{url('/excluir/pedido', $pedido->NR_PEDIDO)}}" class="btn btn-danger btn-apagar"> <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
					</td>
				</tr>
			@endforeach

			</tbody>
	</table>
</div>	
@endsection