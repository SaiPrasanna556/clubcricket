<div class="card-header">
    <p>{{$stat->player->first_name . $stat->player->last_name}}</p>
</div>
<div class="card-body">
    <table class="table table-borderless table-striped">
        <tbody>
            <tr>
                <td colspan="2">
                    <img src="{{asset('storage/players/'. $stat->player->image_uri)}}" style="height:200px;" alt="">
                </td>
            </tr>
            <tr>
                <th>Matches Played</th>
                <td>{{$stat->matches}}</td>
            </tr>
            <tr>
                <th>Total Runs</th>
                <td>{{$stat->runs}}</td>
            </tr>
            <tr>
                <th>Half Centuries</th>
                <td>{{$stat->half_centuries}}</td>
            </tr>
            <tr>
                <th>Centuries</th>
                <td>{{$stat->centuries}}</td>
            </tr>
            <tr>
                <th>Average</th>
                <td>{{$stat->average}}</td>
            </tr>
        </tbody>
    </table>
</div>