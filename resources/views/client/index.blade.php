@extends('client.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h3>Teams&nbsp;<sub>* click on the team name to see the players list</sub></h3>
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>logo</th>
                        <th>Name</th>
                        <th>Club State</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td><img src= "{{asset('storage/teams/'.$team->logo_uri)}}" alt="{{$team->name}}" style="height:25px;width:35px;"/></td>
                        <td><a href="/team/player/{{$team->id}}">{{$team->name}}</a></td>
                        <td>{{$team->club_state}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-4">
            <h3>Points Table</h3>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Team</th>
                        <th>P</th>
                        <th>W</th>
                        <th>L</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($points as $point)
                    <tr>
                        <td>{{$point->team->name}}</td>
                        <td>{{$point->matches_played}}</td>
                        <td>{{$point->points/2}}</td>
                        <td>{{(($point->matches_played*2)-$point->points)/2}}</td>
                        <td>{{$point->points}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p><b>*P</b> - Matches Played &nbsp;&nbsp; <b>*L - </b> Lost&nbsp;&nbsp;<b>*W</b> Won</p>
        </div>
    </div>
</div>

@endsection

