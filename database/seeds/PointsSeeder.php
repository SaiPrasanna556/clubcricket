<?php

use Illuminate\Database\Seeder;
use App\Points;
use App\Team;
use App\Match;

class PointsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::select('id')->get();
        foreach($teams as $team){
            $matchesPlayed = Match::where('team1_id','=',$team->id)
                        ->orWhere('team2_id','=',$team->id)
                        ->get();
            $points = Match::where('winner_id','=',$team->id)->get();            
            Points::create([
                'team_id' => $team->id,
                'points' => count($points) * 2,
                'matches_played' => count($matchesPlayed)
            ]);            
        }
    }
}
