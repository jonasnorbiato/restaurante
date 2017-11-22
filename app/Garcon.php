<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garcon extends Model
{
    protected $table='GARCON';
 	protected $primaryKey='NR_GARCON';
 	protected $fillable=['NOME'];
	public $timestamps = false;

	public function conta()
	{
		return $this->hasMany('App\Conta', 'NR_GARCON', 'NR_GARCON');
	}		
}
