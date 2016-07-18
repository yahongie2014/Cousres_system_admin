<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Placement extends Model
{
    protected $table = 'placements';

    protected $date = [
        'date'
    ];

    function setDateAttribute($value)
    {
        if ($value) {
            $this->attributes['date'] = Carbon::createFromFormat('Y-m-d', $value);
        }       
    }
}
