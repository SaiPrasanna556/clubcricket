@extends('layouts.app')
@section('content')
<div class="container">
<h3 class="title-heading">{{$stats->player->first_name}} {{$stats->player->last_name}} Stats</h3>
    <div class="row">
        
        <div class="col-sm-3">
            <img src="{{asset('storage/players/'.$stats->player->image_uri)}}" style="height:300px;width:100%;"/>
        </div>
        <div class="col-sm-9">
            <table class="table table-borderless table-striped">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>{{$stats->player->first_name}} {{$stats->player->last_name}}</td>
                    </tr>
                    <tr>
                        <th>Jersey Number</th>
                        <td>{{$stats->player->jersey_number}}</td>
                    </tr>
                    <tr>
                        <th>Matches Played</th>
                        <td>{{$stats->matches}}</td>
                    </tr>
                    <tr>
                        <th>Total Runs</th>
                        <td>{{$stats->runs}}</td>
                    </tr>
                    <tr>
                        <th>Half Centuries</th>
                        <td>{{$stats->half_centuries}}</td>
                    </tr>
                    <tr>
                        <th>Centuries</th>
                        <td>{{$stats->centuries}}</td>
                    </tr>
                    <tr>
                        <th>Average</th>
                        <td>{{$stats->average}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection