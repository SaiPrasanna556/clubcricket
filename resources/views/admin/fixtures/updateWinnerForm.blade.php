<form action="{{route('admin.fixture.updateWinner')}}" method="post">
    <div class="form-group">
        <div class="row">
            <label>Choose Winner</label>
            <select name="winner_id" class="form-control">
                <option value="{{$match->team1_id}}">{{$match->team1->name}}</option>
                <option value="{{$match->team2_id}}">{{$match->team2->name}}</option>
            </select>
            @CSRF()
        </div>
        <input type="text" hidden name="match_id" value="{{$match->id}}">
        <br>
        <button class="btn btn-primary btn-sm float-right">Submit</button>
    </div>
</form>