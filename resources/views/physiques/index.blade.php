            @extends('layouts.app')

            @section('content')

            <div class="row justify-content-center">
                <div class="col-md-10">
                	<div class="card">
                        <div class="card-header">
                         <h2>Progress stats</h2>	
                     </div>
                     <div class="card-body">
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Weight</th>
                              <th scope="col">Benchpress</th>
                              <th scope="col">Deadlift</th>
                              <th scope="col">Squat</th>
                              <th scope="col">Date</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>{{$latestPhysique->weight}}</td>
                            <td>{{$latestPhysique->benchpress}}</td>
                            <td>{{$latestPhysique->deadlift}}</td>
                            <td>{{$latestPhysique->squat}}</td>
                            <td>{{$latestPhysique->created_at->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <td>{{$previousPhysique->weight}}</td>
                            <td>{{$previousPhysique->benchpress}}</td>
                            <td>{{$previousPhysique->deadlift}}</td>
                            <td>{{$previousPhysique->squat}}</td>
                            <td>{{$previousPhysique->created_at->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                          @foreach($report as $value)
                          <td>{{$value}}</td>
                          @endforeach
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

<div class="row justify-content-center mt-4">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h2>Personal records</h2>	
      </div>
      <div class="card-body">
          <p>Height</p>
          <p>Wieght</p>
          <p>Bmi</p>
          <p>squat</p>
          <p></p>
          <p></p>
      </div>
  </div>
</div>	



<div class="col-md-5">
   <div class="card">
    <div class="card-header">
        <h2>Saved workouts</h2> 
    </div>
    <div class="card-body">
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
        <td>{{$physique->created_at->format('d-m-Y')}}</td>
        <td>{{$physique->comment}}</td>
        <td><a class="btn btn-primary" href="{{ route('physiques.show', ['physique' => $physique->id]) }}">Show</a></td>
    </tr>
  @endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection