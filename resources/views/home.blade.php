@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-5">

        <div class="card shadow-lg bg-warning mt-4">
        <div class="card-header ">
          <h2>Personal records</h2> 
      </div>
      <div class="card-body">
        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Exercise</th>
                              <th scope="col">Weigth</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Benchpress</td>
                            <td><b>{{$personalRecords['benchpress']}}</b></td>
                        </tr>
                        <tr>
                            <td>Deadlift</td>    
                            <td><b>{{$personalRecords['deadlift']}}</b></td>
                          </tr>
                          <tr>
                            <td>Squat</td>       
                            <td><b>{{$personalRecords['squat']}}</b></td>
                        </tr>
                      </tbody>
                    </table>
        </div>
    </div>
</div>
<div class="col-md-5">

        <div class="card mt-4 shadow-lg">
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
                            <tr>
                                <td>{{ $latestGoal->description }}</td>
                                <td>{{ $latestGoal->created_at }}</td>
                                <td>
                                    <form method="POST" action="{{ route('goals.update', ['goal' => $latestGoal->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input value="done" name="status" hidden>
                                        <button class="btn btn-primary mt-3" type="submit">Done. As always.</button>
                                    </form>
                                    <form method="POST" action="{{ route('goals.update', ['goal' => $latestGoal->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <input value="canceled" name="status" hidden>
                                        <button class="btn btn-danger mt-3" type="submit">Cancel.</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
    <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Latest notes. 
                </div>
                <div class="card-body">
                    @if($latestNotes)
                        @foreach($latestNotes as $note)

                        <p>{{$note->created_at}}</p>
                        <p>{{$note->content}}</p>

                        @endforeach
                    @else

                    <p>No notes.</p>

                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5">
        </div>
    </div>



@endsection
