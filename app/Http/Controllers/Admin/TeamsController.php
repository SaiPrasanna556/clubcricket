<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class TeamsController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('admin.teams.index',compact('teams'));
    }

    public function addForm(){
        return view('admin.teams.addForm');
    }   

    public function save(Request $request){
        $imageName = null;
        if($request->file('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->put($file->getFilename() . '.' . $extension, File::get($file));            
            $imagePath = $file->getClientOriginalName();
            $imageName = $file->getFilename() . '.' . $extension;
        }
        $team = new Team();
        $team->name = $request->get('name');
        $team->club_state = $request->get('club_state');
        $team->logo_uri = $imageName;
        $team->save();
        return redirect('/admin');
    }
}
