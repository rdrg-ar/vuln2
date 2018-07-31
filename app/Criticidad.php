<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Criticidad extends Model
{
	Use Sortable;
	
	protected $table = 'criticidades';

	public $sortable = ['id','texto'];

    public function vulnsinfra()
    {
        return $this->hasMany('App\VulnInfra');
    }

    public function vulnsserpico()
    {
        return $this->hasMany('App\VulnSerpico');
    }
}
