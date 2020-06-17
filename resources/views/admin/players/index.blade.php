@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12">
        <h3 class="title-heading">Players</h3>
        <a href="/admin/team/addForm/{{$team_id}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Add Player</a>
        <br/><br/>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Jersey Number</th>
                    <th>Image</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{$player->first_name}}{{$player->last_name}}</td>
                        <td>{{$player->jersey_number}}</td>
                        <td><img src="{{asset('storage/players/'.$player->image_uri)}}" style="height:40px;width:70px;"/></td>
                        <td>{{$player->country}}</td>
                        <td>
                    
                            <a href="/admin/player/{{$player->id}}" class="btn btn-primary btn-sm">Stats</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection