@extends('client.master')

@section('content')
<img src="{{asset('storage/teams/'.$team->logo_uri)}}" style="width:100%;height:300px;margin-top:-25px;"/>
<div class="container">
    <div class="row">
        <br/>
        <h1>{{$team->name}}</h1>                
    </div>
    <br/>
    <div class="row">
        <div class="col-sm-8">
            <h3>Players&nbsp;<sub>* click on the player name to see the stats</sub></h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Jersey Number</th>
                        <th>Country</th>
                        <th>Club State</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($team_details as $detail)
                    <tr>
                        <td><a href="#" onclick="GetPlayerStats({{$detail->id}})">{{$detail->first_name . $detail->last_name}}</a></td>
                        <td><img id="player_image" src="{{asset('storage/players/'.$detail->image_uri)}}" onerror="loadDefaultImage()" alt="{{$detail->first_name}}" style="height:25px;width:35px;"/></td>
                        <td>{{$detail->jersey_number}}</td>
                        <td>{{$detail->country}}</td>
                        <td>{{$detail->team->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
        <h3>Stats</h3>
            <div class="card card-default stats">
                
            </div>
        </div>
    </div>
</div>

@endsection