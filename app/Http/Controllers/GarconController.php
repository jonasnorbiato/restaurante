<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Garcon;
use DB;


class GarconController extends Controller
{
    public function cadastrar()
    {
    	return view('garcon.cadastrar');
    }


    public function salvar()
    {
		$request=\Request::except(['_token']);
    	
		$validator = Validator::make($request, [
		'nome' => 'required||max:40|unique:GARCON'],
		[
			'nome.required' => 'Nome do garçom é obrigatório.',
			'nome.max' =>'Máximo de 40 caracteres no nome. ',
			'nome.unique' =>'Já existe registro com esse nome. '
 		]);


 		if($validator->fails()){

 			return redirect('/cadastrar/garcom')->withInput($request)->withErrors($validator);
 		}	
 		// return var_dump($request['']);
 		Garcon::create(['NOME'=>$request['nome']]);

 		\Session::flash('sucesso', 'Garçom cadastrado com sucesso');
 		return redirect('/cadastrar/garcom');
    }

    public function visualizar()
    {	
    	$garcons=Garcon::get();
    	return view('garcon.visualizar', ['garcons'=>$garcons]);
    }

    public function excluir($NR_GARGON)
    {
    	DB::table('GARCON')->where('NR_GARCON','=',$NR_GARGON)->delete();
    	\Session::flash('sucesso', 'Garçom excluído.');
    	return redirect('/visualizar/garcom');
    }

	public function editar($id)
    {
    	$garcon=Garcon::where('NR_GARCON','=',$id)->get();
    	
    	return view('garcon.editar', ['garcon'=>$garcon[0]]);
    }

    public function inserir($id)
    {	
    	$request=\Request::except(['_token']);
    	
		$validator = Validator::make($request, [
		'nome' => 'required||max:40'],
		[
			'nome.required' => 'Nome do garçom é obrigatório.',
			'nome.max' =>'Máximo de 40 caracteres no nome. ',
			
 		]);

 		if($validator->fails()){

 			return redirect(url('/editar/garcon', $id))->withInput($request)->withErrors($validator);
 		}	
 		
 		$g=Garcon::where('NR_GARCON','=', $id)->get();
 		$g[0]->update(['NOME'=>$request['nome']]);
 		\Session::flash('sucesso', 'Garçom atualizado com sucesso.');
    	return redirect('/visualizar/garcom');
    }

}
