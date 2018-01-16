<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coral extends Model
{
    public $fillable = [
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
	'blueridge',
	'blue',
	'brick',
	'yellow',
	'dark_red',
	'orange',
	'green',
	'turquoise',
	'pink',
	'mustard',
	'summary',
	'description'];

}
