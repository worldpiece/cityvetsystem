@extends('layouts.app')
@section('title')
    CityVet System | Appointment
@endsection
@section('content')
    <div class="container mt-5" style="max-width: 1000px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Staff</h2>
        {!! QrCode::size(200)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Staff Details') }}</div>
                    @foreach ($staffs as $staff)
                    <div class="card-body">
                        
                        {{-- Employee Number --}}
                        <div class="row mb-3">
                            <label for="employee_no"
                                class="col-md-4 col-form-label text-md-end">{{ __('Employee No.') }}</label>

                            <div class="col-md-6">
                                <input id="employee_no" type="number"
                                    class="form-control @error('employee_no') is-invalid @enderror" name="employee_no"
                                    value="{{ old('employee_no') }}" required autocomplete="employee_no" autofocus>

                                @error('employee_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- First Name --}}
                        <div class="row mb-3">
                            <label for="first_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ ucfirst($pet->pet_name) }}" required autocomplete="first_name" autofocus>
                            </div>
                        </div>

                        {{-- Middle Name --}}
                        <div class="row mb-3">
                            <label for="middle_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>
                            <div class="col-md-6">
                                <input id="middle_name" type="text"
                                    class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                    value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Last Name --}}
                        <div class="row mb-3">
                            <label for="last_name"
                                class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Designation --}}
                        <div class="row mb-3">
                            <label for="designation"
                                class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>
                            <div class="col-md-6">
                                <input id="designation" type="text"
                                    class="form-control @error('designation') is-invalid @enderror" name="designation"
                                    value="{{ old('designation') }}" required autocomplete="designation" autofocus>

                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Contact Number --}}
                        <div class="row mb-3">
                            <label for="contact_number"
                                class="col-md-4 col-form-label text-md-end">{{ __('Contact No.') }}</label>
                            <div class="col-md-6">
                                <input id="contact_number" type="number"
                                    class="form-control @error('contact_number') is-invalid @enderror" name="contact_number"
                                    value="{{ old('contact_number') }}" required autocomplete="contact_number" autofocus>

                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- Address --}}
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
