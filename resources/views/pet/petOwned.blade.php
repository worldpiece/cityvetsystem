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
            @foreach($petOwned as $data)
                <th>{{ $data->pet_name}}</th><br>
                <th>{{ $data->age}}</th><br>
                <th>{{ $data->pet_classification}}</th><br>
                <th>{{ $data->date_of_birth}}</th><br>
            @endforeach



        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
