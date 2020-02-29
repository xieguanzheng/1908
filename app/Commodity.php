<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
	protected $table='commodity';
	protected $primaryKey ='c_id';
	public $timestamps= false;
	//黑名单
	protected $guarded=[];
}
