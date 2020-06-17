<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Player;
use App\PlayerHistory;
use App\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PlayersController extends Controller
{
    public function index($team_id){
        $players = Player::where('team_id','=',$team_id)->get();
        return view('admin.players.index',compact('players','team_id'));
    }

    public function addForm($team_id){
        return view('admin.players.addForm',compact('team_id'));
    }

    public function save(Request $request){
        $player = new Player();
        $player->first_name = $request->get('first_name');
        $player->last_name = $request->get('last_name');
        $player->jersey_number = $request->get('jersey_number');
        $player->country = $request->get('country');
        $player->team_id = $request->get('team_id');
        $imageName = null;
        if($request->file('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('players')->put($file->getFilename() . '.' . $extension, File::get($file));            
            $imagePath = $file->getClientOriginalName();
            $imageName = $file->getFilename() . '.' . $extension;
        }
        $player->image_uri = $imageName;
        $player->save();
        return redirect('/admin/team/'.$request->get('team_id'));
    }
}
