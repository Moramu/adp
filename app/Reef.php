<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reef extends Model
{
    protected $fillable = ['id','material_id','corals_id','reef_sum_rtl','reef_sum_whl','username'];
}
