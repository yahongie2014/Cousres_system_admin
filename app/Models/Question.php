<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';

    public function exam()
    {
        return $this->belongsTo('\App\Models\Exam', 'exam_id');
    }

    public function choices()
    {
        return $this->hasMany('\App\Models\Choice', 'question_id');
    }

    public function question_answers()
    {
        return $this->hasMany('\App\Models\ExamQuestion', 'question_id');
    }
}
