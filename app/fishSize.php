<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fishSize extends Model
{
    protected $fillable = ['fish_id','js','s','sm','m','ml','l','xl','n_a'];


    public function fish () {
	return $this->belongsTo('App\Fish');
    }

}
