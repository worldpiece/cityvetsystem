@extends('layouts.app')
@section('title')
    CVS | Reports
@endsection
@section('content')
    <div class="container mt-5" style="max-width: 1600px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Reports</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="mb-2 float-right">
            <button type="button" class="btn btn-success">
                <a class="nav-link" href="{{ route('admin.report') }}">{{ __('Reports') }}</a>
            </button>
        </div>
        <div id='appointment-table' style="border: 2px solid #eee">
            <div class="table-responsive">
                @livewire('staff-datatables')
            </div>
        </div>
    </div>
@endsection