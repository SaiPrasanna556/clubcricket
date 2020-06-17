<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function players()
    {
        return $this->hasMany('App\Player','team_id');
    }

    public function team1()
    {
        return $this->hasMany('App\Match','team1_id');
    }

    public function team2()
    {
        return $this->hasMany('App\Match','team2_id');
    }

    

    public function winner()
    {
        return $this->hasMany('App\Match','winner_id');
    }

    public function points(){
        return $this->hasMany('App\Points','team_id');
    }
}
