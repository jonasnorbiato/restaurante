<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
USE App\Mesa;
use DB;

class MesaController extends Controller
{
   public function exibir()
   {	
   		$mesas=Mesa::get();
   		// $mesas=DB::table('MESA')->get();
   		
   		return view('mesa.exibir', ['mesas'=>$mesas]);
   }
}
