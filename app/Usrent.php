<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usrent extends Model
{
	protected $table='Usrent';
	protected $primaryKey ='uid';
	public $timestamps= false;
	//黑名单
	protected $guarded=[];
}
