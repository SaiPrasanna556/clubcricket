@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12">
        <h3 class="title-heading">Teams</h3>
        <a href="{{route('admin.teams.addForm')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;Add Team</a>
        <br/><br/>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Club State</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td><img src="{{asset('storage/teams/'.$team->logo_uri)}}" style="height:40px;width:70px;"/></td>
                        <td>{{$team->name}}</td>
                        <td>{{$team->club_state}}</td>
                        <td>
                            
                            <a href="admin/team/{{$team->id}}" class="btn btn-primary btn-sm">Players</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection