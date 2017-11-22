@extends ('layouts.layout')

@section('content')
<h2 class="titulo_boby">Abrir Conta na Mesa {{$nr_mesa}}


</h2>
<br>
<form action="{{url('/inserir/conta')}}" method="POST">
	{{ csrf_field() }}
	<div class="col-xs-12">
		<label class="negrito" for="">Garçom:</label>
	</div>
	<input type="number" name="nr_mesa" value="{{$nr_mesa}}" hidden="">

		<div class="col-xs-12">
			<select name="garcon" id="" class="form-control" >
			@foreach($garcons as $garcon)
					<option  value="{{$garcon->NR_GARCON}}">{{$garcon->NOME}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-xs-12">
		<br>
		<label for="" class="negrito">Pedido:</label>
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
</div>

</form>

<div class="col-xs-12">
		<br>	
	
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

   		 @if(Session::has('er'))
    		<div class="alert alert-danger alert-dismissible">
				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    			<i class="fa fa-times" aria-hidden="true"></i>
	    			{!! session('er') !!}

	    	</div>
		@endif
	</div> 

@endsection