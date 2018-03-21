<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
     protected $fillable = ['item_number',
	        'name',
	        'list_price',
	        'extended_price',
	        'co_stock','provider',
	        'rtl_price',
	        'whl_price',
	        'quantity'];
}
