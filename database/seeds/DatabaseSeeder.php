<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeamsTableSeeder::class);
        $this->call(PlayersSeed::class);
        $this->call(PlayerHistorySeeder::class);
        $this->call(MatchesSeeder::class);
        $this->call(PointsSeeder::class);
    }
}
