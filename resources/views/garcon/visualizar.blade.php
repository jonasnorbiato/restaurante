@extends ('layouts.layout')

@section('content')
<h2 class="titulo_boby"> Visualizar Garçons </h2>
	@if(Session::has('sucesso'))
		<div class="alert alert-success alert-dismissible">
		 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<i class="fa fa-check" aria-hidden="true"></i>
				{!! session('sucesso') !!}

		</div>
	@endif


<div class="xol-xs-12">

	<table class="table table-striped table-hover tabela">			
			<thead>
				<tr>
					<th class="">
						NOME
					</th>
					
					<th class="">
						

					</th>
					<th></th>
					
					
				</tr>
			</thead>
			<tbody>
			@foreach($garcons as $garcon)
				<tr>
					<td>
						{{$garcon->NOME}}
					</td>
					<td>
						<a href="{{url('/editar/garcon', $garcon->NR_GARCON)}}" class="btn btn-primary "> <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
					</td>
					<td>
						<a href="{{url('/excluir/garcon', $garcon->NR_GARCON)}}" class="btn btn-danger btn-apagar"> <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
					</td>

					</tr>
				
			@endforeach

			</tbody>
	</table>
</div>	
@endsection