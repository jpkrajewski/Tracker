@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Write what's on your mind...
                </div>
                <div class="card-body">
                	<form>
                		<textarea class="w-100" rows="10"></textarea>
                		<form method="POST" action="{{ route('goals.store') }}">
                                @csrf
                                @method('POST')

                            <button class="btn btn-primary mt-3" type="submit">Save</button>
                        </form>
                	</form>
                </div>
            </div>
        </div>
    </div>
@endsection