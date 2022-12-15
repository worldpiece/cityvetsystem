@extends('layouts.app')
@section('title')
    CVS | Blocked Dates
@endsection
@section('content')

<div class="container">
            <h2 class="h2 text-left mb-5 border-bottom pb-3">Blocked Dates</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
    <div class="d-inline form-group col-md-6">
        <form method="POST" action="{{ route('admin.store') }}">
        @csrf
        {{-- DOB --}}
        <div class="row mb-3">
            <label for="blocked_date"
                class="col-md-4 col-form-label text-md-end">{{ __('Block Date') }}</label>
            <div class="col-md-6">
                <input id="blocked_date" type="date"
                    class="form-control @error('blocked_date') is-invalid @enderror" name="blocked_date"
                    value="{{ old('blocked_date') }}" required autocomplete="blocked_date" autofocus>

                @error('blocked_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div>
                <button type="submit" class="btn btn-success mt-2 mb-4">
                    {{ __('Block Date') }}
                </button>
                </div>
            </div>
            <div class="col-md-6">
            <!-- <input type="text" id="selected_date" class="form-control col-md-2" placeholder="Click here to select date." > -->

            </div>
        </div>
        </form>
    </div>
    <div id='appointment-table' style="border: 2px solid #eee">
        <div class="table-responsive">
            @livewire('blocked-out-dates-datatables')
        </div>
    </div>
</div>
@endsection