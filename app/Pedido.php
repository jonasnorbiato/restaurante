<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table='PEDIDO';
 	protected $primaryKey=['NR_PEDIDO', 'NR_CONTA', 'NR_ITEM'];
 	public $incrementing = false;
 	protected $fillable=['QUANTIDADE', 'PRECO_UNITARIO','NR_CONTA', 'NR_ITEM'];
	public $timestamps = false;

	public function conta()
	{
		return $this->hasOne('App\Conta', 'NR_CONTA', 'NR_CONTA');
	}		

	public function itemcardapio()
	{
		return $this->hasOne('App\ItemCardapio', 'NR_ITEM', 'NR_ITEM');
	}		
}
