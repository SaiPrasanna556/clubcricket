@extends('layouts.app')
@section('content')
    <div class="container">
    <h3 class="title-heading">New Fixture</h3>
        <div class="row">
            <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <form action="{{route('admin.fixture.save')}}" method="post">
                        @CSRF()
                        <div class="form-group">
                            <label>Choose Team1</label>
                            <select name="team1" id="" class="form-control">
                                @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Choose Team2</label>
                            <select name="team2" id="" class="form-control">
                                @foreach($teams as $team)
                                <option value="{{$team->id}}">{{$team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Match Date</label>
                            <input type="date" required class="form-control" name="match_date">
                        </div>
                        <button class="btn btn-primary btn-sm float-right">Submit</button>
                    </form>
                </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection