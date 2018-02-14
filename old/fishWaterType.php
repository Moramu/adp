<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fishWaterType extends Model
{
    protected $fillable = ['type'];

/**
    public function fishType () {
	$this->belongsTo('\App\Fish', 'fish_id');
    }
**/
}
