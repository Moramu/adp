<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterParam extends Model
{
    protected $fillable = [
	'line',
	'ph',
	'nitrite',
	'nitrate',
	'phosphate',
	'kh',
	'salt'];
}
