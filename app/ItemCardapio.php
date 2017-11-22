<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCardapio extends Model
{
     protected $table='ITEMCARDAPIO';
 	protected $primaryKey='NR_ITEM';
 	protected $fillable=['NOME',
 						'DESCRICAO',
 						'PRECO'
 						];
	public $timestamps = false;

	public function pedido()
	{
		return $this->hasMany('App\Pedido', 'NR_ITEM', 'NR_ITEM');
	}	
}
