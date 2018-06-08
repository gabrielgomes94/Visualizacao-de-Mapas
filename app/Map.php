<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = ['id', 'name', 'description', 'center_point'];

    public function accessedBy()
    {
    	return $this->belongsToMany('App\User', 'map_user');
    }

    public function layers()
    {
    	return $this->hasMany('App\Layer');
    }
}
