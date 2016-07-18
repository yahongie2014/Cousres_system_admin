<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'post';

 protected $fillable = [
    'parent_id', 'parent_type', 'post', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('\App\User', 'user_id');
    }

    public function comments()
    {
    	return $this->hasMany('\App\Models\Comment', 'post_id');
    }
}
