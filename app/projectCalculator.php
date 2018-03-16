<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectCalculator extends Model
{
    protected $fillable = ['project_name','corals','material','rtl_price','whl_price','description','user'];
}
