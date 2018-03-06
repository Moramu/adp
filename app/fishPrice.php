<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fishPrice extends Model
{
    protected $fillable = ['fish_id','size','price','rtl_price','wholesale_price','special_price'];


    public function fish () {
	return $this->belongsTo('App\Fish');
    }

}
