@extends('layouts.app')
@extends('layouts.appointment')
@section('title')
    CVS | Appointment
@endsection
@section('content')

@if (Auth::user() && Auth::user()->role == 1)
    <div class="container mt-5" style="max-width: 1600px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Set an appointment</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div id='calendar' style="border: 2px solid #eee"></div>
    </div>
    <!-- Modal -->
    <div class="modal" id="appointment-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set an appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <div class="row">

                                <div class="form-group col-md-4" style="overflow: auto;">
                                    {{-- <label for="client-id" class="col-form-label">ID</label> --}}
                                    <input type="hidden" class="form-control" id="client-id"
                                        value="{{ Auth::user()->id }}">
                                </div>
                                {{-- <div class="form-group col-md-6" style="overflow: auto;">
                                    <label for="client-name" class="col-form-label">Username</label>
                                    <input type="text" class="form-control text-center" id="client-name"
                                        value="{{ ucfirst(Auth::user()->user_name) }}" disabled>
                                </div> --}}
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="pet-name" class="col-form-label">Pet Name</label>
                            <select class="form-select" aria-label="Default select example" id="pet-name">
                                <option value="" disabled selected>Select a pet</option>
                                @foreach ($pets as $pet)
                                    @if ($pet)
                                        <option>{{ $pet->pet_name }} </option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="petNameError"></span>
                            <input type="hidden" name="pet-id" value=" ">
                        </div>
                        <div class="mb-2">
                            <label for="appointment-type" class="col-form-label">Appointment Type</label>
                            <select class="form-select" aria-label="Default select example" id="appointment-type">
                                <option value="" disabled selected>Choose an appointment type</option>
                                @foreach ($appointment_types as $type)
                                    <option>{{ $type->type_of_appointment }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="appmntTypeError"></span>
                        </div>
                        <div class="mb-2">
                            <label for="symptoms" class="col-form-label">Symptoms</label>
                            <textarea class="form-control" id="symptoms"></textarea>
                            <span class="text-danger" id="symptomsError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger" style="position: absolute; left: 15px;"
                        id="btnDelete">Delete</button> --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSave">Set Appointment</button>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="container mt-5" style="max-width: 1600px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Set an appointment</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div id='calendar' style="border: 2px solid #eee"></div>
    </div>
    <!-- Modal -->
    <div class="modal" id="appointment-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set an appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <div class="row">

                                <div class="form-group col-md-4" style="overflow: auto;">
                                    {{-- <label for="client-id" class="col-form-label">ID</label> --}}
                                    <input type="hidden" class="form-control" id="client-id"
                                        value="{{ Auth::user()->id }}">
                                </div>
                                {{-- <div class="form-group col-md-6" style="overflow: auto;">
                                    <label for="client-name" class="col-form-label">Username</label>
                                    <input type="text" class="form-control text-center" id="client-name"
                                        value="{{ ucfirst(Auth::user()->user_name) }}" disabled>
                                </div> --}}
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="pet-name" class="col-form-label">Pet Name</label>
                            <select class="form-select" aria-label="Default select example" id="pet-name">
                                <option value="" disabled selected>Select a pet</option>
                                @foreach ($pets as $pet)
                                    @if ($pet)
                                        <option>{{ $pet->pet_name }} </option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger" id="petNameError"></span>
                            <input type="hidden" name="pet-id" value=" ">
                        </div>
                        <div class="mb-2">
                            <label for="appointment-type" class="col-form-label">Appointment Type</label>
                            <select class="form-select" aria-label="Default select example" id="appointment-type">
                                <option value="" disabled selected>Choose an appointment type</option>
                                @foreach ($appointment_types as $type)
                                    <option>{{ $type->type_of_appointment }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="appmntTypeError"></span>
                        </div>
                        <div class="mb-2">
                            <label for="symptoms" class="col-form-label">Symptoms</label>
                            <textarea class="form-control" id="symptoms"></textarea>
                            <span class="text-danger" id="symptomsError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger" style="position: absolute; left: 15px;"
                        id="btnDelete">Delete</button> --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSave">Set Appointment</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
