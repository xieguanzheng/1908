<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mercha extends Model
{
	protected $table='mercha';
	protected $primaryKey ='m_id';
	public $timestamps= false;
	//黑名单
	protected $guarded=[];
}
