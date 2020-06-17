<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware'=> 'auth'],function(){
    Route::get('/',[
        'uses' => 'Admin\TeamsController@index',
        'as' => 'admin.teams.index'
    ]);
    Route::get('/addForm',[
        'uses' => 'Admin\TeamsController@addForm',
        'as' => 'admin.teams.addForm'
    ]);
    Route::post('/save',[
        'uses' => 'Admin\TeamsController@save',
        'as' => 'admin.teams.save'
    ]);
});

Route::group(['prefix'=>'admin/team','middleware' => 'auth'],function(){
    Route::get('/{team_id}',[
        'uses' => 'Admin\PlayersController@index',
        'as' => 'admin.team.players'
    ]);
    Route::get('/addForm/{team_id}',[
        'uses' => 'Admin\PlayersController@addForm',
        'as' => 'admin.player.addForm'
    ]);
    Route::post('/save',[
        'uses' => 'Admin\PlayersController@save',
        'as' => 'admin.player.save'
    ]);
});

Route::group(['prefix'=>'admin/player','middleware' => 'auth'],function(){
    Route::get('/{player_id}',[
        'uses' => 'Admin\StatsController@index',
        'as' => 'admin.player.stats'
    ]);
    Route::get('/addForm/{player_id}',[
        'uses' => 'Admin\StatsController@addForm',
        'as' => 'admin.stats.addForm'
    ]);
    Route::post('/save',[
        'uses' => 'Admin\StatsController@save',
        'as' => 'admin.stats.save'
    ]);
});


Route::group(['prefix'=>'admin/fixtures','middleware' => 'auth'],function(){
    Route::get('/',[
        'uses' => 'Admin\FixturesController@index',
        'as' => 'admin.fixture.index'
    ]);
    Route::get('/addForm',[
        'uses' => 'Admin\FixturesController@addForm',
        'as' => 'admin.fixture.addForm'
    ]);
    Route::post('/save',[
        'uses' => 'Admin\FixturesController@save',
        'as' => 'admin.fixture.save'
    ]);
    Route::get('/updateWinnerForm/{match_id}',[
        'uses' => 'Admin\FixturesController@updateWinnerForm',
        'as' => 'admin.fixture.updateWinnerForm'
    ]);
    Route::post('/updateWinner',[
        'uses' => 'Admin\FixturesController@updateWinner',
        'as' => 'admin.fixture.updateWinner'
    ]);
});


Route::get('/',[
    'uses' => 'Client\MatchesController@index',
    'as' =>'matches.index'
]);

Route::get('/team/player/{id}',[
    'uses' => 'Client\MatchesController@getPlayersByTeam',
    'as' =>'team.getPlayers'
]);

Route::get('/team/player/stats/{id}',[
    'uses' => 'Client\MatchesController@getPlayerStats',
    'as' =>'team.getPlayerStats'
]);

Route::get('/schedule',[
    'uses' => 'Client\MatchesController@getSchedule',
    'as' => 'getschedule'
]);