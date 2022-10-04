@extends('layouts.app')
@section('title')
    CVS | Appointment
@endsection
@section('content')
    <div class="container mt-5" style="max-width: 1600px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Set an appointment</h2>
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
                                    <label for="client-id" class="col-form-label">ID</label>
                                    <input type="text" class="form-control" id="client-id" value="{{ ucfirst(Auth::user()->id) }}" disabled>
                                </div>
                                <div class="form-group col-md-8" style="overflow: auto;">
                                    <label for="client-name" class="col-form-label">Client Name</label>
                                    <input type="text" class="form-control" id="client-name" value="{{ ucfirst(Auth::user()->first_name) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <!-- <label for="appointment-code" class="col-form-label">Appointment Code</label>
                        <input type="text" class="form-control" id="appointment-code">
                        <div class="mb-2">
                            <label for="pet-id" class="col-form-label">Pet ID</label>
                            <select class="form-select" aria-label="Default select example" id="pet-id">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div> -->
                        <div class="mb-2">
                            <label for="appointment-type" class="col-form-label">Appointment Type</label>
                            <select class="form-select" aria-label="Default select example" id="appointment-type">
                                <option value="tagging">Tagging</option>
                                <option value="confine">Confine</option>
                                <option value="anti-rabies">Anti rabies</option>
                                <option value="give-birth">Give Birth</option>
                            </select>
                        </div>
                        <!-- <div class="mb-2">
                            <div class="form-group">
                                <label for="timeStarts">Time Starts</label>
                                <div class='input-group' id='date-time-starts'>
                                    <input type="text" class="timepicker form-control" id="startTime" name="startTime" />
                                    {{-- <input type='time' id="startTime" class="form-control" /> --}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="form-group">
                                <label for="timeEnds">Time Ends</label>
                                <div class='input-group' id='date-time-ends'>
                                    <input type="text" class="timepicker form-control" id="endTime" name="endTime" />
                                    {{-- <input type='time' id="endTime" class="form-control" /> --}}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <div class="mb-2">
                            <label for="symptoms" class="col-form-label">Symptoms:</label>
                            <textarea class="form-control" id="symptoms"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" style="position: absolute; left: 15px;"
                        id="btnDelete">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSave">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @extends('layouts.appointment')
@endsection
