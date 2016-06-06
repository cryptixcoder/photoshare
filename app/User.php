<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function following(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'follow_id');
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'follow_id', 'user_id');
    }

    public function isFollowing(User $user){
        return (bool) $this->following()->where('follow_id', $user->id)->count();
    }

    public function follow(User $user){
        return $this->following()->attach($user->id);
    }

    public function unfollow(User $user){
        return $this->following()->detach($user->id);
    }
}
