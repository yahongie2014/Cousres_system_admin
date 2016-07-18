<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentAnswer extends Model
{

    protected $table = 'assignment_answer';

    public function student()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function assignment()
    {
        return $this->belongsTo('\App\Models\Assignment', 'assignment_id');
    }
}
