<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App\Models
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property string $status
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'color', 'status'
    ];
}
