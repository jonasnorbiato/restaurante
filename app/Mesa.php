<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
   protected $table='MESA';
 	protected $primaryKey='NR_MESA';
 	public $incrementing = false;
 	protected $fillable=['NR_MESA'];
	public $timestamps = false;

	public function conta()
	{
		return $this->hasMany('App\Conta', 'NR_MESA', 'NR_MESA');
	}		
}
