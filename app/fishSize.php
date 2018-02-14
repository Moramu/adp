<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fishSize extends Model
{
    protected $fillable = ['fId','js','s','sm','m','ml','l','xl','n/a'];

/**
    public function fishSz () {
	return $this->belongsTo('\App\Fish');
    }
**/
}
