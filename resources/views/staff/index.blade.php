@extends('layouts.app')
@section('title')
    CVS | Staff
@endsection
@section('content')

    <div class="home-container">
        <div class="home-title">
        <h1>Staff Management</h1>
        <br>

    </div>
    <div class="container mt-5" style="max-width: 1600px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Records</h2>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="mb-2 flex" style="display:flex; justify-content:space-between">
            <button type="button" class="btn btn-success">
                <a class="nav-link" href="{{ route('staff.create') }}">{{ __('Register') }}</a>
            </button>
            <button type="button" class="btn btn-primary">
                <a class="nav-link" href="{{ route('admin.report') }}">{{ __('Export to PDF') }}</a>
            </button>
        </div>
        <div id='pet-table' style="border: 2px solid #eee">
            <div class="table-responsive">
                @livewire('staff-datatables')
            </div>
        </div>
    </div>
@endsection

