@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        @if($player)
        <div class="col-sm-8">
            <h3>Stats for {{$player->first_name}}{{$player->last_name}}</h3>
            <br/>
            <form action="{{route('admin.stats.save')}}" method="post" enctype="multipart/form-data">
                @CSRF()
                <div class="form-group">
                    <label>Matches Played</label>
                    <input type="text" class="form-control" name="matches_played" required>
                </div>
                <input type="text" hidden name="player_id" value="{{$player->id}}">
                <div class="form-group">
                    <label>Total Runs</label>
                    <input type="text" class="form-control" name="total_runs" required>
                </div>
                <div class="form-group">
                    <label>Half-Centuries</label>
                    <input type="text" class="form-control" name="half_centuries" required>
                </div>
                <div class="form-group">
                    <label>Centuries</label>
                    <input type="text" class="form-control" name="centuries" required>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
        @else
            <h3>Player Not Found. Please choose another player</h3>
        @endif
        <div class="col-sm-2"></div>
    </div>
</div>
@endsection