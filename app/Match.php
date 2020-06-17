<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function team1(){
        return $this->belongsTo('App\Team','team1_id');
    }

    public function team2(){
        return $this->belongsTo('App\Team','team2_id');
    }

    public function winner(){
        return $this->belongsTo('App\Team','winner_id');
    }
}
