@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($todayPost)
                <a class="btn btn-primary" href="{{ route('posts.show', ['post' => $todayPost]) }}">Take note now</a>
            @else
                <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                    <button class="btn btn-primary" type="submit">Start taking notes today</button>
                </form>
            @endif
            <div class="card mt-4">
                <div class="card-header">
                	Days you posted notes.
                </div>
                <div class="card-body">
                	<table class="table table-striped">
                        <thead>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                               <td>{{ $post->created_at }}</td>
                               <td>action</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection