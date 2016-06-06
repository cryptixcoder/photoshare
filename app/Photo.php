<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }
}
