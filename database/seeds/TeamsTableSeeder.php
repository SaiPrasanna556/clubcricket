<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'CSK',
            'logo_uri' => 'team1.jpg',
            'club_state' => 'Chennai'
        ]);
        Team::create([
            'name' => 'RCB',
            'logo_uri' => 'team2.jpg',
            'club_state' => 'Bangalore'
        ]);
        Team::create([
            'name' => 'MI',
            'logo_uri' => 'team3.jpg',
            'club_state' => 'Mumbai'
        ]);
        Team::create([
            'name' => 'DC',
            'logo_uri' => 'team5.jpg',
            'club_state' => 'Delhi'
        ]);
        Team::create([
            'name' => 'SRH',
            'logo_uri' => 'team4.jpg',
            'club_state' => 'Hyderabad'
        ]);
        Team::create([
            'name' => 'RR',
            'logo_uri' => 'team6.jpg',
            'club_state' => 'Rajasthan'
        ]);
        
    }
}
