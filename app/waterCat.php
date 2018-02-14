<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class waterCat extends Model
{
    protected $fillable = ['type','category'];

    public function waterCat () {
	return $this->hasMany('\App\Fish');
    }
    
}