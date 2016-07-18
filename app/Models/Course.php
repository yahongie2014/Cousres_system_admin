<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{

    protected $table = 'courses';

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

    public function module()
    {
        return $this->belongsTo('\App\Models\Module', 'module_id');
    }

    public function sessions()
    {
        return $this->hasMany('\App\Models\Lecture', 'course_id');
    }

    public function assignments()
    {
        return $this->hasMany('\App\Models\Assignment', 'course_id');
    }
}
