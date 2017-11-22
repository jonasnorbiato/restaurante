<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Conta;
use App\Garcon;
use App\ItemCardapio;
use App\Pedido;
use DB;

class ContaController extends Controller
{
	  public function status($nr_mesa)
	  {
	  	$conta=DB::table('CONTA')->where('NR_MESA', '=', $nr_mesa)->orderBy('NR_CONTA', 'desc')->take(1)->get();
	  	if (count($conta)<1) {
	  		$garcons=Garcon::get();
	  		$itens=ItemCardapio::get();
	  		// return var_dump($itens);
	  		return view('conta.cadastrarConta', ['nr_mesa'=>$nr_mesa , 'garcons'=>$garcons , 'itens'=>$itens]);
	  	}

	  	elseif (is_null($conta[0]->HORA_FECHAMENTO)) {
	  		// return var_dump($conta);
	  		$pedidos=Pedido::where('NR_CONTA', '=', $conta[0]->NR_CONTA)->get();
	  		
	  		return view('conta.opcao', [ 'nr_mesa'=>$nr_mesa , 'conta'=>$conta , 'pedidos'=> $pedidos]);
	  	}

	  	else {
	  		$garcons=Garcon::get();
	  		$itens=ItemCardapio::get();
	  		// return var_dump($itens);
	  		return view('conta.cadastrarConta', ['nr_mesa'=>$nr_mesa , 'garcons'=>$garcons , 'itens'=>$itens]);
	  	}
	  }


	  public function inserir()
	  {
	  	$request=\Request::except(['_token']);
	  	$validator = Validator::make($request, [
		'garcon' => 'required',
		

 		]);
	  	
 		if($validator->fails()){

 			return redirect(url('/realizar/pedido', $request['nr_mesa']))->withInput($request)->withErrors($validator);
 		}	
 		$dia= date('Y-m-d');
 		$hora=date('H:i:s');
 		$idItem=$request['nr_item'];
 		if($request['quant'][$idItem] <1)
 		{
 			 \Session::flash('er','Preencha o campo quantidade.');	
 			 return redirect(url('/realizar/pedido', $request['nr_mesa']));
 		}
 		$valor= ($request['quant'][$idItem]) * ($request['valor'][$idItem]);
 		$quant=$request['quant'][$idItem];

 		DB::beginTransaction();
        try 
        {
	  		 $conta= Conta::create(['DATA'=>$dia, 'HORA_ABERTURA'=> $hora, 'NR_MESA'=>$request['nr_mesa'], 'NR_GARCON'=>$request['garcon'] ]);

	 		 Pedido::create(['NR_CONTA'=>$conta->NR_CONTA, 'QUANTIDADE'=>$quant, 'NR_ITEM'=>$idItem, 'PRECO_UNITARIO'=>$valor]);
	 		DB::commit();
	 	}
	 	catch (Exception $e) 
        {
            DB::rollback();
          
         }


        \Session::flash('sucesso','Pedido efetuado com sucesso.');
	  	return redirect(url('/realizar/pedido', $request['nr_mesa']));

	  }


	  public function fechar($NR_CONTA)
	  {
	  	$pedidos=Pedido::where('NR_CONTA', '=',$NR_CONTA)->get();
	  	$valor=0;
	  	foreach ($pedidos as $key => $pedido) {
	  		$valor=$valor+$pedido->PRECO_UNITARIO;
	  	}

	  	$conta=Conta::find($NR_CONTA);

	  	return view('conta.contaFechar', ['pedidos'=>$pedidos , 'conta'=>$conta, 'valor'=>$valor]);


	  }

	  public function fecharSalvar($NR_CONTA)
	  {
	  	$conta=Conta::find($NR_CONTA);

	  	$hora=date('H:i:s');
	  	$conta->update(['HORA_FECHAMENTO'=>$hora]);

        \Session::flash('sucesso','Conta da Mesa '.$conta->NR_MESA.' finalizada com sucesso.');
	  	return redirect('/');

	  	
	  }

	 public function visualizar()
	 {
	 	$contas=Conta::whereNotNull('HORA_FECHAMENTO')->orderBy('DATA')->get();

	 	foreach ($contas as $key => $conta) {
	 		$total[]=Pedido::where('NR_CONTA','=', $conta->NR_CONTA)->sum('PRECO_UNITARIO');
	 		
	 	}
	 	return view('conta.visualizar', ['contas'=>$contas , 'total'=>$total]);

	 }

	 public function excluir($NR_CONTA)
	 {	
	 	DB::table('PEDIDO')->where('NR_CONTA','=', $NR_CONTA)->delete();
	 	DB::table('CONTA')->where('NR_CONTA','=', $NR_CONTA)->delete();
	 	\Session::flash('sucesso','Venda cancelada com sucesso.');
	 	return redirect('/');

	 }


}



