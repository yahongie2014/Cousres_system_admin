<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamDate extends Model
{

    protected $table = 'exam_dates';

    public function exam()
    {
        return $this->belongsTo('\App\Models\Exam', 'exam_id');
    }
}
