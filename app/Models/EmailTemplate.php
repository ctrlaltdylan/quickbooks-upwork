<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
     /**
     * @var string
     */
    protected $table = 'email_templates';

    /**
     * The attributes that are protected from mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id' ];
}
