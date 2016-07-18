<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Page extends Model
{
	use Translatable;

    protected $table = 'pages';

	public $useTranslationFallback = true;

    public $translatedAttributes = [
    	'title', 'meta_title', 'meta_keyword', 'meta_description'
    ];

    protected $fillable = [
    'title', 'meta_title', 'meta_keyword', 'meta_description', 'status'
    ];

    public function page_descs()
    {
    	return $this->hasMany('\App\Models\PageDesc', 'page_id');
    }
}
