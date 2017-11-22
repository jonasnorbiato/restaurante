<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'CONTA';
	protected $primaryKey = 'NR_CONTA';
	protected $fillable = [
      'DATA',
      'HORA_ABERTURA',
      'HORA_FECHAMENTO',
      'NR_MESA',
      'NR_GARCON'
    ];
    public $timestamps = false;

    public function garcon()
	{
		return $this->hasOne('App\Garcon', 'NR_GARCON', 'NR_GARCON');
	}

	public function pedido()
	{
		return $this->hasMany('App\Pedido', 'NR_CONTA', 'NR_CONTA');
	}

	public function mesa()
	{
		return $this->hasOne('App\Mesa', 'NR_MESA', 'NR_MESA');
	}


}
