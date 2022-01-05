@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                	New goal
                </div>
                <div class="card-body">
                	<form method="POST" action="{{ route('goals.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                		  <input class="form-control" placeholder="Enter new goal to crush" type="text" name="description">
                		  <button class="btn btn-primary mt-3" type="submit">Save</button>
                        </div>
                	</form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    Recent goals
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($recentGoals as $goal)
                            <tr>
                                <td>{{ $goal->description }}</td>
                                <td>{{ $goal->created_at }}</td>
                                <td>
                                    <form method="POST" action="{{ route('goals.update', ['goal' => $goal->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input value="done" name="status" hidden>
                                        <button class="btn btn-primary mt-3" type="submit">Done. As always.</button>
                                    </form>
                                    <form method="POST" action="{{ route('goals.update', ['goal' => $goal->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input value="pussy" name="status" hidden>
                                        <button class="btn btn-danger mt-3" type="submit">I'm pussy</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card mt-4 text-white bg-success">
                <div class="card-header">
                   Finished goals
                </div>
                <div class="card-body">
                    <table class="table text-white">
                        <thead>
                            <th>#</th>
                            <th>Description</th>
                            <th>Finish date</th>
                            <th>Time</th>
                        </thead>
                        <tbody>
                            @foreach($finishedGoals as $key => $goal)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $goal->description }}</td>
                                <td>{{ $goal->updated_at }}</td>
                                <td>{{ $goal->doneInTime }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card mt-4 bg-danger text-white">
                <div class="card-header">
                   Pussied out
                </div>
                <div class="card-body">
                    <table class="table text-white">
                        <thead>
                            <th>Description</th>
                            <th>Pussied out date</th>
                        </thead>
                        <tbody>
                            @foreach($pussiedOutGoals as $goal)
                            <tr>
                               <td>{{ $goal->description }}</td>
                               <td>{{ $goal->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection