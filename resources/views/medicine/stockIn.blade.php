@extends('layouts.app')
@section('title')
    CityVet System | Appointment medInfo
@endsection
@section('content')
    <div class="container mt-5" style="max-width: 1000px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Register a Medicine</h2>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Medicine Details') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('medicine.edited', $medInfo->id) }}">
                            @csrf
                          <!--  {{-- Name --}}
                            <div class="row mb-3">
                                <label for="med_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Medicine Name') }}</label>

                                <div class="col-md-6">
                                    <input id="med_name" type="text"
                                        class="form-control @error('med_name') is-invalid @enderror" name="med_name"
                                        value="{{ $medInfo->name }}" required autocomplete="med_name" autofocus>

                                    @error('med_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->
                            {{-- Quantity --}}
                            <div class="row mb-3">
                                <label for="stockIn"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Stock In') }}</label>
                                <div class="col-md-6">
                                    <input id="stockIn" type="number"
                                        class="form-control @error('stockIn') is-invalid @enderror" name="stockIn"
                                        value="" required autocomplete="stockIn" autofocus>

                                    @error('stockIn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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
