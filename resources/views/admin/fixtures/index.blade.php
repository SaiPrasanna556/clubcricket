@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h3 class="title-heading">Fixtures</h3>
                <br>
                <a href="{{route('admin.fixture.addForm')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i>&nbsp;Add Fixture</a>
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th>Match Date</th>
                            <th>Fixture</th>
                            <th>Winner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matches as $match)
                            <tr>
                                <td>{{date('Y-m-d',strtotime($match->match_date))}}</td>
                                <td>{{$match->team1->name}} vs {{$match->team2->name}}</td>
                                <td>
                                    @if($match->winner_id == 0)
                                    <button class="btn btn-primary btn-sm" onclick="UpdateWinner({{$match->id}})">Update Winner</button>
                                    @else
                                    {{$match->winner->name}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-1"></div>
            <div class="modal" id="winnerModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Winner</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="padding:20px;">
                            <div class="winner_body"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection