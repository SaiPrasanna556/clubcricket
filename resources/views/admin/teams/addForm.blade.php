@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12">
        <h3 class="title-heading">Add Team</h3>
        <form action="{{route('admin.teams.save')}}" method="post" enctype="multipart/form-data">
            @CSRF()
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required/>
            </div>
            <div class="form-group">
                <label>Club State</label>
                <input type="text" class="form-control" name="club_state" required/>
            </div>
            <div class="form-group">
                <label>Logo</label>
                <input type="file" class="form-control" name="logo" required/>
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
@endsection