@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Write what's on your mind...
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('notes.store') }}">
                        @csrf
                        @method('POST')
                        <input name="post_id" value="{{$post->id}}" type="hidden">
                        <textarea class="w-100" rows="10" name="content"></textarea>
                        <button class="btn btn-primary mt-3" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                	{{ $post->created_at->format('l d-m-Y') }}
                </div>
                <div class="card-body">
                    @if ($notes == null) 
                        <p>You haven't posted any notes today.</p>
                    @endif
                	@foreach ($notes as $note)
                        <b>{{$note->created_at->toTimeString()}}</b>
                        <p>{{$note->content}}</p>
                    @endforeach
                </div>
            </div>
        </div>
@endsection