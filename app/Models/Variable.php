<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
     /**
     * @var string
     */
    protected $table = 'variables';

    /**
     * The attributes that are protected from mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id' ];
}
