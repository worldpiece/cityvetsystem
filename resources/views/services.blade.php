@extends('layouts.home')

@section('content')
    <br>
    <div class="row text-center">
        <h1 class="fw-bold" style="color: rgb(0, 112, 211)">OUR SERVICES</h1>
    </div>
    <br>
    <div class="home-container text-center">
        <div class="px-5">
            <p class="font-monospace fs-5">
                In Alaminos City, there is a vet's office called Alaminos Veterinary Office. It is located nearby to Don
                Leopoldo D. Alcedo Slaughterhouse. This facility offers comprehensive veterinary medical services.
                Additionally,
                it is focused on the prevention and care of illnesses in household pets and farm animals. We've made it our
                goal
                to offer compassionate and knowledgeable veterinarian care services.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="card-group">
            <div class="card">
                <img src="{{ asset('system-img/anti-rabies.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Anti-Rabies</h5>
                    <p class="card-text">Rabies vaccine can prevent rabies if given to a person after an exposure. The
                        vaccine should be given as soon as possible after an exposure but may be effective any time before
                        symptoms begin.
                    </p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('system-img/tagging.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tagging</h5>
                    <p class="card-text">Tagging is an important part of animal identification as it helps a producer or
                        farmer to identify a certain animal for reproductive and health concerns, as well as for culling and
                        selling.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('system-img/deworming.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Deworming</h5>
                    <p class="card-text">Deworming is an important preventative care regime for reducing parasites
                        &#40;internal
                        and external&#41; and improving your pet&apos;s health.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('system-img/confine.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Confine</h5>
                    <p class="card-text">The confined animal develops any signs of illness, it should be evaluated by a
                        veterinarian. Any illness in the animal should be reported immediately to the local health
                        department</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('system-img/give-birth.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Giving Birth</h5>
                    <p class="card-text">Giving birth is a natural process, it is common for dogs/animals to have problems
                        with labor. It is helpful for owners to know what a normal birthing process is, as well as some
                        guidelines regarding when veterinary assistance may be required.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
