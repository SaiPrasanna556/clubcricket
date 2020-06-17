<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function team(){
        return $this->belongsTo('App\Team','team_id');
    }

    public function player(){
        return $this->hasMany('App\PlayerHistory','player_id');
    }
}
