<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LunchRec extends Model
{
    protected $table = 'lunch-recs';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'nices')
                    ->withTimestamps();
    }
}
