<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DTour extends Model
{
    protected $table = 'dtour';
    public function tour(){
    	return $this->belongsTo('App\Tour');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
