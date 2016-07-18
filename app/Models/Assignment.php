<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Assignment extends Model
{

    protected $table = 'assignments';

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

    public function students()
    {
        return $this->belongsToMany('\App\User', 'assignment_answer', 'assignment_id', 'user_id');
    }

    public function answers()
    { 
        return $this->hasMany('\App\Models\AssignmentAnswer', 'assignment_id');
    }
}