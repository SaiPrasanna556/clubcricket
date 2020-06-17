<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use App\Points;
use App\Team;
use App\Player;
use App\PlayerHistory;

class MatchesController extends Controller
{
    public function index(){
        $teams = Team::get();
        $points = Points::with('team')->orderBy('points','desc')->get();
        return view('client.index',compact('teams','points'));
    }

    public function getPlayersByTeam($team_id){
        $team = Team::find($team_id);
        $team_details = Player::with('team')->where('team_id','=',$team_id)->get();
        return view('client.team_details',compact('team_details','team'));
    }

    public function getPlayerStats($player_id){
        $stat = PlayerHistory::with('player')->where('player_id' ,'=', $player_id)->first();
        return view('client.player_stats',compact('stat'));
    }

    public function getSchedule(){
        $matches = Match::with('team1')->with('team2')->with('winner')->get();
        return view('client.schedule',compact('matches'));
    }
}
