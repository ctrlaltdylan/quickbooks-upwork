<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leadsource extends Model
{
    protected $table = "leadsource";
    protected $guarded = ['id'];

    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'lead_source','title');
    }
}
