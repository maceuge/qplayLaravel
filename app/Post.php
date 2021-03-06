<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function coment () {
       return $this->hasMany(Coment::class);
    }

    public function like () {
        return $this->hasMany(Like::class);
    }
}
