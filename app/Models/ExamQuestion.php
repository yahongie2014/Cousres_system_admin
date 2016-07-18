<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{

    protected $table = 'exam_questions';

    public function exam()
    {
        return $this->belongsTo('\App\Models\Exam', 'exam_id');
    }

    public function question()
    {
        return $this->belongsTo('\App\Models\Question', 'question_id');
    }

    public function student()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
