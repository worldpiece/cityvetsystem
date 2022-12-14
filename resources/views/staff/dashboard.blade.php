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
        <div class="mb-2 float-right">
        </div>
        <div id='pet-table' style="border: 2px solid #eee">
            <div class="table-responsive">
                <tr>
                    <td>Employee Number: {{ ucfirst($staffInfo->employee_no) }}</td>
                    <td class="text-center">
                    </td>
                </tr>

                <br><br>

                <h1>Time-in and Time-out data</h1>

                <button type="button" class="btn btn-success">
                <a class="nav-link" href="/">{{ __('return to homepage') }}</a>
            </button>
            </div>
        </div>


    </div>
@endsection