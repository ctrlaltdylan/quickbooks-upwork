<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Helpers\helpers;

class Client extends Model
{
    protected $guarded = ['id'];



    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getLeadDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getOriginalEstDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getAppointmentDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getSignedContractDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getStartDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getHandoverDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getGivenToProdDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getOriginalProjectedEndDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }


    public function getAdjustedEndDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getActualEndDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getFollowUpDateAttribute($value)
    {
        if ($value != NULL) {
            return Carbon::parse($value)->format('d-m-Y');
        } else {
            return '';
        }
    }

    public function getFstatus()
    {
        $helpers = new helpers();
        $status = $helpers->status();
        return @$status[@$this->status];
    }

    public function user()
    {
        return $this->hasOne('App\Models\User','id','estimator');
    }

}
