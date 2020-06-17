<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\PlayerHistory;
use App\Match;
use App\Points;

class TeamsController extends Controller
{
    public function index(){
        $teams = Team::select('id','name','logo_uri','club_state')->get();
        return response()->json($teams, 200);
    }

    public function getTeamDetails($team_id){        
        $team_details = Player::with('team')->where('team_id','=',$team_id)->get();
        $response = (count($team_details) > 0) ? response()->json(['details'=>$team_details], 200) : response()->json(['msg' => "Invalid Team ID"], 200);
        return $response;        
    }

    public function getPlayerDetails($player_id){
        $playerHistory = PlayerHistory::where('player_id','=',$player_id)->first();
        $response = ($playerHistory) ? response()->json(['details'=>$playerHistory], 200) : response()->json(['msg' => "Invalid Player ID"], 200);
        return $response;        
    }

    public function getMatches(){
        $matches = Match::with('team1')->with('team2')->with('winner')->get();
        return response()->json(['matches' => $matches], 200);
    }

    public function getPoints(){
        $points = Points::with('team')->get();
        return response()->json( $points, 200);
    }

}
