<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_name','projeect_photo','corals','material','rtl_price','whl_price','description','user'];
}
