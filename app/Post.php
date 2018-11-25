<?php

namespace InstaLaravel;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'text', 'img_src', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('InstaLaravel\User');
    }
}
