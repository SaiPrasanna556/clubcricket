<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use App\Match;
use App\Points;

class FixturesController extends Controller
{
    public function index(){
        $matches = Match::with('team1')->with('team2')->with('winner')->orderBy('id','desc')->get();
        return view('admin.fixtures.index',compact('matches'));
    }

    public function addForm(){
        $teams = Team::select('id','name')->get();
        return view('admin.fixtures.addForm',compact('teams'));
    }

    public function save(Request $request){
        $match = new Match();
        $match->team1_id = $request->get('team1');
        $match->team2_id = $request->get('team2');
        $match->winner_id = 0;
        $match->match_date = $request->get('match_date');
        $match->save();
        return redirect('/admin/fixtures');
    }

    public function updateWinnerForm($match_id){
        $match = Match::with('team1')->with('team2')->find($match_id);
        return view('admin.fixtures.updateWinnerForm',compact('match'));
    }

    public function updateWinner(Request $request){
        $match = Match::find($request->get('match_id'));
        $match->winner_id = $request->get('winner_id');
        $match->save();
        // Team1
        $team1_points = Points::where('team_id','=',$match->team1_id)->first();
        if($team1_points){
            $team1_points->matches_played = $team1_points->matches_played + 1;
            $team1_points->save();
        }else{
            $points = new Points();
            $points->team_id = $match->team1_id;
            $points->matches_played = 1;
            $points->save();
        }
        // Team2
        $team2_points = Points::where('team_id','=',$match->team2_id)->first();
        if($team2_points){
            $team2_points->matches_played = $team2_points->matches_played + 1;
            $team2_points->save();
        }else{
            $points = new Points();
            $points->team_id = $match->team2_id;
            $points->matches_played = 1;
            $points->save();
        }
        //Update Winner
        $points = Points::where('team_id','=',$match->winner_id)->first();
        $points->points = $points->points + 2;
        $points->save();
        return redirect('/admin/fixtures');
    }
}
