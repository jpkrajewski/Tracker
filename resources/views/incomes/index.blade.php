@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    New income.
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('incomes.store') }}">
                        @csrf
                        <input name="user_id" value="{{auth()->user()->id}}" hidden>
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" min="1" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" autocomplete="description" autofocus required>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Stats.
                </div>
                <div class="card-body">
                    <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        THIS MONTH
                        <span>{{now()->format('m-Y')}}</span>
                        <span>{{$thisMonthIncome}} zł</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        LAST MONTH
                        <span>{{now()->subMonth(1)->format('m-Y')}}</span>
                        <span>{{$lastMonthIncome ?? 0}} zł</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        BEST MONTH
                        @if ($bestMonthIncome)
                        <span>{{$bestMonthIncome->created_at->format('m-Y')}}</span>
                        <span>{{$bestMonthIncome->total_monthly_income ?? 0}}</span>
                        @else
                        <span>No records to create</span>
                        @endif
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card mt-4">
                <div class="card-header">
                    All recorded income.
                </div>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <th>Title</th>
                            <th>Comment</th>
                            <th>Earned at</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            @foreach($allIncome as $income)
                            <tr>
                                <td>{{ $income->title}}</td>
                                <td>{{ $income->description }}</td>
                                <td>{{ $income->created_at }}</td>
                                <td>{{ $income->amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
@endsection