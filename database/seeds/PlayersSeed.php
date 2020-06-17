<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $teamArray = ['csk','rcb','mi','dc','srh','rr'];

    public function run()
    {
        for($j = 1; $j <= 6; $j++){
            for($i=1; $i <= 15; $i++){
                Player::create([
                    'first_name' => 'Player'. $i,
                    'last_name' => $this->getLastName($j),
                    'image_uri' => $this->getImageURI($i,$j),
                    'jersey_number' => rand(1,100),
                    'country' => $this->getCountry($i),
                    'team_id' => $j
                ]);
            }
        }
    }

    private function getLastname($player){
        return $this->teamArray[$player-1];
    }

    private function getImageURI($player,$team){        
        return $this->teamArray[$team-1] . 'player'. $player .'.jpg';
    }

    private function getCountry($indexValue){
        $countryArray = ['Australia','New Zealand','South Africa','England','Afganisthan','West Indies'];
        $value = $indexValue <= 9 ? 'India' : $countryArray[array_rand($countryArray)];        
        return $value; 
    }
}
