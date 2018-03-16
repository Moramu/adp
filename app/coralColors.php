<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coralColors extends Model
{
    protected $fillable = ['coral_id','blueridge','blue','brick','yellow','dark_red','orange','green','turquoise','purple','pink','mustard','summary'];

    public function coral () {
	return $this->belongsTo('\App\Coral');	
    }
}
