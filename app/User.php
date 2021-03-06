<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'birthday', 'avatar', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function band() {
        return $this->hasMany(Band::class);
    }

    public function instrument() {
        return $this->hasMany(Instrument::class);
    }

    public function post() {
        return $this->hasMany(Post::class);
    }

    public function friend() {
        return $this->hasMany(Friend::class);
    }

    public function coment() {
        return $this->hasMany(Coment::class);
    }

    public function like () {
        return $this->hasMany(Like::class);
    }

}
