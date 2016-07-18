<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class PageDesc extends Model
{
	use Translatable;

    protected $table = 'page_descriptions';

	public $useTranslationFallback = true;

    public $translatedAttributes = [
    	'title', 'description'
    ];

    protected $fillable = [
    'title', 'description', 'img', 'arrange', 'status'
    ];

    public function page()
    {
    	return $this->belongsTo('\App\Models\Page', 'page_id');
    }
}
