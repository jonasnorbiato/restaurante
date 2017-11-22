@extends ('layouts.layout')

@section('content')
<h2 class="titulo_boby"> Venda Finalizadas </h2>
<?php
	$i=0;
?>

<div class="xol-xs-12">

	<table class="table table-striped table-hover tabela">			
			<thead>
				<tr>
					<th class="">
						DATA
					</th>
					<th>
						PEDIDO
					</th>
					<th class="">
						QUANTIDADE
					</th>
					<th>
						PREÇO
					</th>
					<th class="">
						PREÇO TOTAL
					</th>
					<th></th>
					
				</tr>
			</thead>
			<tbody>
			@foreach($contas as $conta)
				<tr>
					<td>
						{{date('d/m/Y', strtotime($conta->DATA))}}
					</td>
					<td>
						@foreach($conta->pedido as $pedido)
							{{$pedido->itemcardapio->NOME}} <br>
					@endforeach
					</td>
					<td>
					@foreach($conta->pedido as $pedido)
						{{$pedido->QUANTIDADE}}	<br>
					@endforeach
					</td>
					
					<td>						
					@foreach($conta->pedido as $pedido)
						{{$pedido->PRECO_UNITARIO}}	<br>
						
					@endforeach
					</td>
					<td>
						<?php
							
							echo "$total[$i]";
							$i++;
						?>
		
					</td>

					<td>
						<a href="{{url('/cancelar/venda', $conta->NR_CONTA)}}" class="btn btn-danger btn-apagar"> <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
					</td>

					</tr>
				
			@endforeach

			</tbody>
	</table>
</div>	
@endsection