@extends('layouts.app')

@section('content')
   <!-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="home-container">
        <div class="home-title">
            <br>
            <br>
            <h1 class="fw-bold" style="color: rgb(0, 112, 211)">City Veterinary System</h1>
            <br>
        </div>
        <div class="logo-container">
            <img src="{{ asset('img/background-logo.png') }}" id="home-logo" alt="Logo of Alaminos City">
        </div>
        <br>
        <div class="appointment text-center">
            <button type="button" class="btn btn-primary ">
                <a class="nav-link" href="/appointment">{{ __('Set an Appointment') }}</a>
            </button>            
        </div>
    </div>
    
@endsection
