@extends('layouts.app')
@section('title')
    CVS | Pet
@endsection
@section('content')
    <div class="container mt-5" style="max-width: 1600px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Records</h2>
        <div class="mb-2 float-right">
            <button type="button" class="btn btn-success">
                {{-- <a href="{{ route('pet.register') }}">Add New</a> --}}
  <a class="nav-link" href="{{ route('pet.register') }}">{{ __('Register') }}</a>
            </button>
        </div>
        <div id='pet-table' style="border: 2px solid #eee">
            <div class="table-responsive">
                @livewire('pet-datatables')
            </div>
        </div>
    </div>
@endsection
