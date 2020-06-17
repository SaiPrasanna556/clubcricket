<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    public function team(){
        return $this->belongsTo('App\Team','team_id');
    }
}
