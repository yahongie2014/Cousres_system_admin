<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lecture extends Model
{

    protected $table = 'sessions';

    protected $date = [
        'start_date', 'end_date'
    ];

    function setStartDateAttribute($value)
    {
        if ($value) {
            $this->attributes['start_date'] = Carbon::createFromFormat('Y-m-d', $value);
        }       
    }

    function setEndDateAttribute($value)
    {
        if ($value) {
            $this->attributes['end_date'] = Carbon::createFromFormat('Y-m-d', $value);
        }
    }

    public function course()
    {
        return $this->belongsTo('\App\Models\Course', 'course_id');
    }

    public function materials()
    {
        return $this->hasMany('\App\Models\Material', 'session_id');
    }

    public function students()
    {
        return $this->belongsToMany('\App\User', 'attendances', 'session_id', 'user_id');
    }
}
