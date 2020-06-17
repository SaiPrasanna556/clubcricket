@extends('client.master')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h3>Schedule</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Teams</th>
                    <th>Winner</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matches as $match)
                    <tr>
                        <td>{{date('Y-m-d',strtotime($match->match_date))}}</td>
                        <td>{{$match->team1->name}}  vs  {{$match->team2->name}}</td>
                        <td>
                            @if($match->winner != null)
                            {{$match->winner->name}}
                            @else
                            To be known
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="com-sm-2"></div>

    </div>
</div>
@endsection