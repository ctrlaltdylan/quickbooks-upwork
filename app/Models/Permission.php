<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 *
 * @package App\Models
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends Model
{
    /**
     * @var string
     */
    protected $table = 'permissions';

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
        'name', 'description', 'status'
    ];
}
