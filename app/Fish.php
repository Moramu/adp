<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $fillable = [
	'id',
	'item_number',
	'name',
	'photo',
	'barcode',
	'description',
	'type',
	'category'
    ];

    public function fishPrices () {
	return $this->hasMany('App\fishPrice');
    }
    
}
