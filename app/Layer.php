<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
	protected $fillable = ['id', 'map_id', 'schema', 'table', 'geom'];

    public function map()
    {
    	return $this->belongsToMany('App\Map');
    }
}
