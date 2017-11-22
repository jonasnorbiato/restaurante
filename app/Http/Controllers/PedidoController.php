<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemCardapio;
use App\Http\Requests;
use DB;
use Validator;
use App\Pedido;
use App\Conta;

class PedidoController extends Controller
{
   public function cadastrar($nr_conta)
   {
   		$itens=ItemCardapio::get();
   		return view('pedido.cadastrarPedido', ['nr_conta'=>$nr_conta , 'itens'=>$itens]);
   }

   public function inserir($nr_conta)
   {
   		$request=\Request::except(['_token']);
	  	
         $nr_mesa=DB::table('CONTA')->where('NR_CONTA', '=', $nr_conta)->get();
         
 		$dia= date('Y-m-d');
 		$hora=date('H:i:s');
 		$idItem=$request['nr_item'];
 		if($request['quant'][$idItem] <1)
 		{
 			 \Session::flash('er','Preencha o campo quantidade.');	
	     	return redirect(url('/cadastrar/pedido', $nr_conta));
 		}
 		$valor= ($request['quant'][$idItem]) * ($request['valor'][$idItem]);
 		DB::beginTransaction();
        try 
        {		 Pedido::create(['NR_CONTA'=>$nr_conta, 'QUANTIDADE'=>$request['quant'][$idItem], 'NR_ITEM'=>$idItem, 'PRECO_UNITARIO'=>$valor]);
	 		DB::commit();
	 	}
	 	catch (Exception $e) 
        {
            DB::rollback();
          
         }

        \Session::flash('sucesso','Pedido efetuado com sucesso.');
        	return redirect(url('/realizar/pedido', $nr_mesa[0]->NR_MESA));


   }

   public function excluir($NR_PEDIDO)
   {
    $pedido=Pedido::where('NR_PEDIDO','=', $NR_PEDIDO)->get();

    $mesa=Conta::where('NR_CONTA','=', $pedido[0]->NR_CONTA)->get();
    DB::table('PEDIDO')->where('NR_PEDIDO','=', $NR_PEDIDO)->delete();

    \Session::flash('sucesso','Pedido excluído com sucesso.');
       return redirect(url('/realizar/pedido', $mesa[0]->NR_MESA));
   }

}
