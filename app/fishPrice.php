<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fishPrice extends Model
{
    protected $fillable = ['fish_id','size_id','price','rtl_price','wholesale_price','special_price','quantity'];


    public function fish () {
	return $this->belongsTo('App\Fish');
    }

    public function fishSize () {
	return $this->belongsTo('App\fishSize');
    }

}
