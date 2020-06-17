@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12">
        <h3 class="title-heading">Add Player</h3>
        <form action="{{route('admin.player.save')}}" method="post" enctype="multipart/form-data">
            @CSRF()
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" required/>
            </div>
            <input hidden type="text" name="team_id" value="{{$team_id}}">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" required/>
            </div>
            <div class="form-group">
                <label>Jersey Number</label>
                <input type="number" class="form-control" name="jersey_number" required />
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" name="country" required/>
            </div>
            <div class="form-group">
                <label>Profile Pic</label>
                <input type="file" class="form-control" name="image" required/>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection