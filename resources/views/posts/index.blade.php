@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                	Days you posted notes.
                </div>
                <div class="card-body">
                @if($todayPost)
                <a class="btn btn-primary" href="{{ route('posts.show', ['post' => $todayPost]) }}">Take note now</a>
                @else
                <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                    <input name="user_id" value="{{$user_id}}" hidden>
                    <button class="btn btn-primary" type="submit">Start taking notes today</button>
                </form>
                @endif
                @if($posts->count() > 0)
                	<table class="table table-striped mt-3">
                        <thead>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                               <td>{{ $post->created_at }}</td>
                               <td><a class="btn btn-primary" href="{{ route('posts.show', ['post' => $post->id]) }}">Show post</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="mt-3">You haven't posted anything yet.</p>
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
@endsection