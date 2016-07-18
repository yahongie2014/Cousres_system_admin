<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageDescTranslation extends Model
{
    protected $table = 'page_description_translations';

    public $timestamps = false;

    protected $fillable = [
    'title', 'description'
    ];
}
