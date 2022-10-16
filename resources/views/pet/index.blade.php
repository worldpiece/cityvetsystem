@extends('layouts.app')
@section('title')
    CVS | Pet
@endsection
@section('content')

    <div class="container mt-5" style="max-width: 1600px">
        <h2 class="h2 text-left mb-5 border-bottom pb-3">Records</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
        <div class="mb-2 float-right">
            <button type="button" class="btn btn-success">
                <a class="nav-link" href="{{ route('pet.create') }}">{{ __('Register') }}</a>
            </button>
        </div>
        <div id='pet-table' style="border: 2px solid #eee">
            <div class="table-responsive">
                @livewire('pet-datatables')
                <!-- <table style="border-collapse: collapse;width: 100%;">
                    <tr style="background-color: #D6EEEE;">
                    <th>id</th>
                    <th>Pet Name</th>
                    <th>Gender</th>
                    <th>Birth_Date</th>
                    <th>Age</th>
                    <th>Pet Classification</th>
                    <th>Action</th>
                    </tr>

                @foreach($petOwned as $data)
                    <tr>
                    <td>{{ $data->id}}</td>
                    <td>{{$data->pet_name}}</td>
                    <td>{{ $data->gender}}</td>
                    <td>{{ $data->birth_date}}</td>
                    <td>{{ $data->age}}</td>
                    <td>{{ $data->pet_classification}}</td>
                    <td> <form method="post" action=""><button type="submit" >Update</button> {{ csrf_field() }}</form>
                         <form method="post" action=""><button type="submit" >Delete</button> {{ csrf_field() }}</form></td>
                    
                    </tr>
                @endforeach -->
            </table>
            </div>
        </div>
    </div>
@endsection
