<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    protected $table = 'materials';

    public function session()
    {
        return $this->belongsTo('\App\Models\Lecture', 'session_id');
    }
}
