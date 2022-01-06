            @extends('layouts.app')

            @section('content')

            <div class="row justify-content-center">
                <div class="col-md-10">
                	<div class="card shadow-lg">
                        <div class="card-header">
                         <h2>Progress stats</h2>	
                     </div>
                     <div class="card-body">

                      @if(is_null($recentReport))

                      <p>Too little workouts to create stats...</p>

                      @else

                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Weight</th>
                              <th scope="col">Benchpress</th>
                              <th scope="col">Deadlift</th>
                              <th scope="col">Squat</th>
                              <th scope="col">Date</th>
                              <th scope="col">Progress</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>{{$latestPhysique->weight}}</td>
                            <td>{{$latestPhysique->benchpress}}</td>
                            <td>{{$latestPhysique->deadlift}}</td>
                            <td>{{$latestPhysique->squat}}</td>
                            <td>{{$latestPhysique->created_at}}</td>
                        </tr>
                        <tr>
                            <td>{{$previousPhysique->weight}}</td>
                            <td>{{$previousPhysique->benchpress}}</td>
                            <td>{{$previousPhysique->deadlift}}</td>
                            <td>{{$previousPhysique->squat}}</td>
                            <td>{{$previousPhysique->created_at}}</td>
                        </tr>
                        <tr>
                          @foreach($recentReport as $value)
                          <td>{{$value}}</td>
                          @endforeach
                          <td>Recent</td>
                      </tr>

                      @if($weeklyReport)

                      <tr>
                          @foreach($weeklyReport as $value)
                          <td>{{$value}}</td>
                          @endforeach
                          <td>Weekly</td>
                      </tr>

                      @endif

                      @if($monthlyReport)

                      <tr>
                          @foreach($monthlyReport as $value)
                          <td>{{$value}}</td>
                          @endforeach
                          <td>Monthly</td>
                      </tr>

                      @endif
                  </tbody>
              </table>

              @endif

          </div>
      </div>
  </div>
</div>

<div class="row justify-content-center mt-4">
    <div class="col-md-4">
      <div class="card shadow-lg bg-warning">
        <div class="card-header ">
          <h2>Personal records</h2>	
      </div>
      <div class="card-body">
          <p><b>Benchpress:  {{$personalRecords['benchpress']}}</b></p>
          <p><b>Deadlift:    {{$personalRecords['deadlift']}}</b></p>
          <p><b>Squat:       {{$personalRecords['squat']}}</b></p>
      </div>
  </div>
</div>	

<div class="col-md-6">
   <div class="card shadow-lg">
    <div class="card-header">
        <h2>Saved workouts</h2>
        <a class="btn btn-primary" href="{{ route('physiques.create') }}">Add latest workout</a> 
    </div>
    <div class="card-body">

    @if($physiques->isEmpty())

    <p>No workouts. Go to the gym.</p>

    @else
     <table class="table">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Comment</th>
          <th scope="col">Action</th>
      </tr>
  </thead>
  <tbody>           

    @foreach ($physiques as $physique)
    <tr>
        <td>{{$physique->created_at}}</td>
        <td>{{$physique->comment}}</td>
        <td><a class="btn btn-primary" href="{{ route('physiques.show', ['physique' => $physique->id]) }}">Show</a></td>
    </tr>
  @endforeach

</tbody>
</table>

@endif

</div>
</div>
</div>
</div>
@endsection