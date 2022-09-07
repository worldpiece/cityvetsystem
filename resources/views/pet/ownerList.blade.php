<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pet</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-dark bg-dark mb-3">
            <span class="navbar-brand mb-1 h1">City Veterinary System | Pet Page</span>
        </nav>
        <div class="container">
            <br><br><br><br><br><br><br>
            @foreach($ownerLists as $data)

             <tr>
                <th>{{ $data->id}} || {{$data->first_name}} || {{ $data->middle_name}} || {{ $data->last_name}} 
                    
                <form method="post" action="{{ route('updateOwner', $data->id) }}"><button type="submit" >Update</button></th> <br> {{ csrf_field() }}</form>
                <form method="post" action="{{ route('deleteOwner', $data->id) }}"><button type="submit" >Delete</button></th> <br> {{ csrf_field() }}</form>
                <form method="post" action="{{ route('petRegister', $data->id) }}"><button type="submit" >Pet Register</button></th> <br> {{ csrf_field() }}</form>
                <form method="get" action="{{ route('petOwned', $data->id) }}"><button type="submit" >Pet Owned</button></th> <br> {{ csrf_field() }}</form>

                <th>{{ $data->contact_number}}</th><br>
                <th>{{ $data->email}}</th><br>
                <th>{{ $data->address}}</th><br>
                <th>{{ $data->password}}</th><br>
            </tr>
            @endforeach

            <form method="post" action="{{ route('deleteAllOwner') }}"><button type="submit" >Delete All</button></th> <br> {{ csrf_field() }}</form>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
