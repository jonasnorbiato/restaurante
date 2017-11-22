@extends ('layouts.layout')

@section('content')
<h2 class="titulo_boby">Fechar Conta da Mesa {{$conta->NR_MESA}} </h2>
<br>
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
				</tr>
			@endforeach
			<tr>
				<th> </th>
				<th ></th>
				<th ></th>
				<th >
					Total: {{$valor}}
				</th>
			</tr>
			
			</tbody>
	</table>
</div>	

<div class="col-xs-8 col-xs-offset-5">
	<a href="{{url('/fechar/conta/salvar', $conta->NR_CONTA)}}" class="btn btn-primary"><h4>FECHAR</h4></a>
</div>
@endsection