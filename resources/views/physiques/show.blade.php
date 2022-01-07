@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
		<div class="col-md-10">
         <div class="card">
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
                            <td>{{$physique->weight}}</td>
                            <td>{{$physique->benchpress}}</td>
                            <td>{{$physique->deadlift}}</td>
                            <td>{{$physique->squat}}</td>
                            <td>{{$physique->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
         	</div>
         </div>
     </div>

			  	@foreach($physique->images as $image)
			    <div class="col-sm-3 mt-4">
			      <img class="d-block w-100 img-thumbnail" src="{{asset('/images/'.$image->path)}}">
			    </div>
			    @endforeach

         </div>
     </div>

@endsection