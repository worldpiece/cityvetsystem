@extends('layouts.home')

@section('content')
    <br>
    <div class="row text-center">
        <h1 class="fw-bold" style="color: rgb(0, 112, 211)">ABOUT US</h1>
    </div>
    <br>
    <div class="text-center">
        <div class="px-5">
            <p class="font-monospace fs-5">
                In Alaminos City, there is a vet's office called Alaminos Veterinary Office. It is located nearby to Don
                Leopoldo D. Alcedo Slaughterhouse. This facility offers comprehensive veterinary medical services.
                Additionally, it is focused on the prevention and care of illnesses in household pets and also farmed
                animals. We've made it our goal to offer compassionate and knowledgeable veterinarian care services.
            </p>
        </div>
    </div>
    <div class="office-img px-5" style="display: flex; justify-content: center">
        <img src="{{ asset('system-img/vet.jpg') }}" class="img-fluid rounded" alt="... ">
    </div>
    <br>
    <br>
@endsection