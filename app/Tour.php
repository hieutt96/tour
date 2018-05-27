<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';

    public function place(){
    	return $this->hasMany('App\Place','tour_id');
    }

    public function dtour(){
    	return $this->hasMany('App\DTour','tour_id');
    }
}
