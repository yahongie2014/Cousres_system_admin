<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Exam extends Model
{

    protected $table = 'exams';

    public function module()
    {
        return $this->belongsTo('\App\Models\Module', 'module_id');
    }

    public function questions()
    {
        return $this->hasMany('\App\Models\Question', 'exam_id');
    }

    public function dates()
    {
        return $this->hasMany('\App\Models\ExamDate', 'exam_id');
    }

    public function question_answers()
    {
        return $this->hasMany('\App\Models\ExamQuestion', 'exam_id');
    }
}
