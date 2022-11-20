@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Attendance Record') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('staff.dashboard') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="user_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Employee Number') }}</label>

                                <div class="col-md-6">
                                    <input id="employee_number" type="number"
                                        class="form-control @error('employee_number') is-invalid @enderror" name="employee_number"
                                        value="{{ old('employee_number') }}" required autocomplete="employee_number" autofocus>

                                        @error('employee_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        @if(session('message'))
                                        <span style="color:red;" role="alert">
                                            <strong>{{ session('message') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('View Attendance Record') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
