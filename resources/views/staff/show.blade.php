@extends('layouts.app')
@section('title')
    CityVet System | Appointment
@endsection
@section('content')
    <div class="container mt-5" style="max-width: 1000px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Staff</h2>
        {{-- {!! QrCode::format('png')->size(200)->generate('Text Here'); !!} --}}
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Staff Details') }}</div>
                    @foreach ($staffs as $staff)
                        <div class="card-body">
                            <div class="row text-center">
                                <span>
                                    <a href="" onclick="window.print()">{!! QrCode::size(200)->generate('Venus Ferrer') !!}</a>
                                </span>
                            </div>
                            <br>
                            {{-- Employee Number --}}
                            <div class="row mb-3">
                                <label for="employee_no"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Employee No.') }}</label>

                                <div class="col-md-2">
                                    <input id="employee_no" type="number"
                                        class="form-control @error('employee_no') is-invalid @enderror" name="employee_no"
                                        value="{{ ucfirst($staff->employee_no) }}" disabled>

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
                                        value="{{ ucfirst($staff->first_name) }}" disabled>
                                </div>
                            </div>

                            {{-- Middle Name --}}
                            <div class="row mb-3">
                                <label for="middle_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>
                                <div class="col-md-6">
                                    <input id="middle_name" type="text"
                                        class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                        value="{{ ucfirst($staff->first_name) }}" disabled>

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
                                        value="{{ ucfirst($staff->last_name) }}" disabled>

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
                                        value="{{ ucfirst($staff->designation) }}" disabled>

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
                                        class="form-control @error('contact_number') is-invalid @enderror"
                                        name="contact_number" value="{{ ucfirst($staff->contact_no) }}" disabled>

                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Address --}}
                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ ucfirst($staff->address) }}" disabled>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="btn-group text-center"> 
                                <button type="button" class="btn btn-info">Back</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
