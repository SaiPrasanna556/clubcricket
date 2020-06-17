<?php

use Illuminate\Database\Seeder;
use App\Match;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $stringVar = '';

    public function run()
    {
        $matchesArray = $this->printCombinations();
        
        $i = count($matchesArray);
        foreach($matchesArray as $match){
            if($match != ""){
                $teamArray = explode(",",$match);
                Match::create([
                    'team1_id' => $teamArray[0],
                    'team2_id' => $teamArray[1],
                    'winner_id' => $teamArray[array_rand($teamArray)],
                    'match_date' => date('Y-m-d', strtotime('-'. $i-1 .'days'))  
                ]);
            }
            $i--;
        }
        
    }

    private function printCombinations(){
        $teamsArray = [1, 2, 3, 4, 5, 6];
        $n = count($teamsArray);
        $r = 2;
        $this->getCombinationArray($teamsArray, $n, $r, 0, array(), 0);
        return explode(" ",$this->stringVar);
    }

    private function getCombinationArray($teamsArray, $n, $r, $index, $data, $i){
        
        $combinationArray = array();
        if ($index == $r) { 
            for ( $j = 0; $j < $r; $j++){ 
                if($j == $r-1){
                    $this->stringVar .= $data[$j] . " ";
                }else{
                    $this->stringVar .=  $data[$j] . ",";
                }
            }           
            //echo $stringVar; 
           // return $stringVar; 
           return;
        } 
        
        if ($i >= $n) 
            return; 
        // current is included, put next at  
            // next location 
        $data[$index] = $teamsArray[$i]; 
        $this->getCombinationArray($teamsArray, $n, $r, $index + 1, $data, $i + 1); 
    
        // current is excluded, replace it with 
        // next (Note that i+1 is passed, but  
        // index is not changed) 
        $this->getCombinationArray($teamsArray, $n, $r, $index, $data, $i + 1);
        
    }
}
