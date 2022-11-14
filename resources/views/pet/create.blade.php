@extends('layouts.app')
@section('title')
    CityVet System | Appointment
@endsection
@section('content')
    <div class="container mt-5" style="max-width: 1000px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Register a Pet</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pet Details') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pet.store') }}">
                            @csrf
                            {{-- Name --}}
                            <div class="row mb-3">
                                <label for="pet_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Pet Name') }}</label>

                                <div class="col-md-6">
                                    <input id="pet_name" type="text"
                                        class="form-control @error('pet_name') is-invalid @enderror" name="pet_name"
                                        value="{{ old('pet_name') }}" required autocomplete="pet_name" autofocus>

                                    @error('pet_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Gender --}}
                            <div class="row mb-3">
                                <label for="pet_gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('pet_gender') is-invalid @enderror" id="pet_gender" name="pet_gender" value="{{ old('pet_gender') }}" required autocomplete="pet_gender" autofocus>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('pet_gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- DOB --}}
                            <div class="row mb-3">
                                <label for="pet_dob"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>
                                <div class="col-md-6">
                                    <input id="pet_dob" type="date"
                                        class="form-control @error('pet_dob') is-invalid @enderror" name="pet_dob"
                                        value="{{ old('pet_dob') }}" required autocomplete="pet_dob" autofocus>

                                    @error('pet_dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Classification --}}
                            <div class="row mb-3">
                                <label for="pet_classification"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Pet Classification') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('pet_classification') is-invalid @enderror" id="pet_classification" name="pet_classification" value="{{ old('pet_classification') }}" required autocomplete="pet_classification" autofocus>
                                        <option value="" disabled selected>Select Pet Classification</option>
                                        <option value="dog">Dog</option>
                                        <option value="cat">Cat</option>
                                        <option value="pig">Pig</option>
                                        <option value="goat">Goat</option>
                                        <option value="cow">Cow</option>
                                        <option value="carabao">Carabao</option>
                                        <option value="chicken">Chicken</option>
                                        <option value="duck">Duck</option>
                                    </select>
                                    @error('pet_classification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" id="current_date" value=" <?php $current_date = new DateTime(); ?>">
                            {{-- <div class="row mb-3">
                                <label for="pet_age"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                                <div class="col-md-6">
                                    <input id="pet_age" type="text"
                                        class="form-control @error('pet_age') is-invalid @enderror" name="pet_age"
                                        value="{{ old('pet_age') }}" required autocomplete="pet_age" autofocus>

                                    @error('pet_age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- owner_id --}}
                            <div class="row">
                                <input type="hidden" id="owner_id" name="owner_id" value="{{ Auth::user()->id }}">
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
