@extends ('layouts.layout')

@section('content')
<h2 class="titulo_boby"> Pedido</h2>
<br>
@if(Session::has('er'))
	<div class="alert alert-danger alert-dismissible">
		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<i class="fa fa-times" aria-hidden="true"></i>
			{!! 	session('er') !!}
	</div>
@endif
<br>
<form action="{{url('/inserir/pedido', $nr_conta)}}" method="post">
	{{ csrf_field() }}
	<table class="table table-striped tabela">			
		<thead>
			<tr>
			
			<th class="coluna_titulo">Quatidade</th>
				<th>
					Nome
				</th>
				<th>
					Preço
				</th>
				<th>
					Descrição
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($itens as $item)
			<tr>
				<td>
					<input name="quant[{{$item->NR_ITEM}}]" type="number" min="1" class="form-control">
				</td>
				<td>
					{{$item->NOME}} 
				</td>
				<td>
					{{$item->PRECO}}
					<input name="valor[{{$item->NR_ITEM}}]" hidden="" value="{{$item->PRECO}}" type="text">
				</td>
				<td>
					{{$item->DESCRICAO}}
				</td>
				<th>	<button name="nr_item" value="{{$item->NR_ITEM}}" type="submit" class="btn btn-primary pull-right"><i class="fa fa-floppy-o fa-2x" aria-hidden="true"></i></button></th>
			</tr>
			@endforeach	
		</tbody>

	</table>
</form>

@endsection