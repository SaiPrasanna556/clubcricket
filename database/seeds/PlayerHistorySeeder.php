<?php

use Illuminate\Database\Seeder;
use App\PlayerHistory;
use App\Player;

class PlayerHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $half_Centuries = 0;
    private $centuries = 0;
    
    public function run()
    {
        $players = Player::select('id')->get();
        foreach($players as $player)
        {
            $matches = rand(1,30);
            $runs = $this->getRuns($matches);
            PlayerHistory::create([
                'player_id' => $player->id,
                'matches' =>$matches,
                'runs' => $runs,
                'half_centuries' => $this->half_Centuries,
                'centuries' => $this->centuries,
                'average' => $this->calAverage($matches,$runs),
                'strike_rate' => 0
            ]);
            $this->half_Centuries=0;
            $this->centuries=0;
        }
    }

    private function getRuns($matches)
    {                
        $runs = 0;
        for($i = 1; $i <= $matches; $i++)
        {
            $randNum = rand(0,150);     
            if($randNum>=100)
            {
                $this->centuries++;
            }
            else if($randNum>=50)
            {
                $this->half_Centuries++;
            }
            $runs = $runs + $randNum;
        }        
        return $runs;
    }

    private function calAverage($matches,$runs){
        return $runs/$matches;
    }
}
