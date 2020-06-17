<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Player;
use App\PlayerHistory;
use App\Team;

class StatsController extends Controller
{
    public function index($player_id){
        $player = Player::with('team')->find($player_id);            
        if($player){
            $stats = PlayerHistory::with('player')->where('player_id','=',$player_id)->first();
            if(!$stats){            
                return view('admin.players.stats.addForm',compact('player'));
            }
            else
                return view('admin.players.stats.index',compact('stats','player_id'));
        }else{
            return redirect('/admin');
        }
        
    }

    public function save(Request $request){        
        $stat = new PlayerHistory();
        $stat->matches = $request->get('matches_played');
        $stat->runs = $request->get('total_runs');
        $stat->half_centuries = $request->get('half_centuries');
        $stat->centuries = $request->get('centuries'); 
        $stat->average = $request->get('total_runs')/$request->get('matches_played');
        $stat->player_id = $request->get('player_id');
        $stat->strike_rate = 0;
        $stat->save();
        return redirect('/admin/player/'.$request->get('player_id'));
    }
}
