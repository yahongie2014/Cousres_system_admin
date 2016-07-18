<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = [
    'title', 'description', 'start_date', 'end_date', 'status'
    ];

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

    public function module_students()
    {
        return $this->belongsToMany('\App\User', 'student_modules', 'user_id', 'module_id');
    }

    public function module_instructors()
    {
        return $this->belongsToMany('\App\User', 'module_instractors', 'user_id', 'module_id');
    }

    public function courses()
    {
        return $this->hasMany('\App\Models\Course', 'module_id');
    }

    public function exams()
    {
        return $this->hasMany('\App\Models\Exam', 'module_id');
    }

    public function culcolations()
    {
        return $this->hasMany('\App\Models\ModuleCulcolation', 'module_id');
    }
}
