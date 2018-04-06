<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reef extends Model
{
    protected $fillable = ['id','name','material_id','m_quantity','m_price','m_price_rtl','m_price_whl'
			    ,'coral_id','c_quantity','c_sum_quantity','reef_sum_rtl','reef_sum_whl','username'];
    
    protected $casts = ['coral_id'=>'array','c_quantity'=>'array'];

    public function corals() {
	return $this->belongsTo('App\Coral');
    }
}
