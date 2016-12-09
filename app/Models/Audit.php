<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
     /**
     * @var string
     */
    protected $table = 'audit';

    /**
     * The attributes that are protected from mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id' ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
