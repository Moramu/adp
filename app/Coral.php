<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Coral extends Model
{
    protected $fillable = [
	'id',
	'item_number',
	'name',
	'photo',
	'plastic_quantity',
	'cost_price',
        'product_weight',
	'retail_price',
	'wholesale_price',
	'barcode',
	'description'];

    public function coralColors () {
	return $this->hasMany('\App\coralColors');
    }

}
