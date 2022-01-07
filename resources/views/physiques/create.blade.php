@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Physique progress') }}</div>

                <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('physiques.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Weight') }}</label>

                            <div class="col-md-6">
                                <input id="weight" type="number" min="40" step="0.01" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight" autofocus>

                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="benchpress" class="col-md-4 col-form-label text-md-end">{{ __('Benchpress') }}</label>

                            <div class="col-md-6">
                                <input id="benchpress" type="number" min="0" step="1" class="form-control @error('benchpress') is-invalid @enderror" name="benchpress" value="{{ old('benchpress') }}" autocomplete="benchpress" autofocus>

                                @error('benchpress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deadlift" class="col-md-4 col-form-label text-md-end">{{ __('Deadlift') }}</label>

                            <div class="col-md-6">
                                <input id="deadlift" type="number" min="0" step="1" class="form-control @error('deadlift') is-invalid @enderror" name="deadlift" value="{{ old('deadlift') }}" autocomplete="deadlift" autofocus>

                                @error('deadlift')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="squat" class="col-md-4 col-form-label text-md-end">{{ __('Squat') }}</label>

                            <div class="col-md-6">
                                <input id="squat" type="number" min="0" step="1" class="form-control @error('squat') is-invalid @enderror" name="squat" value="{{ old('squat') }}" autocomplete="squat" autofocus>

                                @error('squat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image-front" class="col-md-4 col-form-label text-md-end">{{ __('Physique front') }}</label>

                            <div class="col-md-6">
                                <input id="image-front" type="file" accept="images/*" class="form-control" name="physique[]" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image-side" class="col-md-4 col-form-label text-md-end">{{ __('Physique side') }}</label>

                            <div class="col-md-6">
                                <input id="image-side" type="file" accept="images/*" class="form-control" name="physique[]" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image-back" class="col-md-4 col-form-label text-md-end">{{ __('Physique back') }}</label>

                            <div class="col-md-6">
                                <input id="image-back" type="file" accept="images/*" class="form-control" name="physique[]" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Comment') }}</label>

                            <div class="col-md-6">
                                <input id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
