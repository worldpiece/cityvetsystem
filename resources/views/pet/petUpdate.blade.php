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
        <form method="post" action="{{ route('updatePetSaved', $petInfo->id) }}">                
            {{ csrf_field() }}

                <label id="owner_id"> --- Owner id : {{$petInfo->owner_id}} --- </label><br><br>
                
                <label for="lname">--- Pet Info ---</label><br><br>

                <label for="pname">Name:</label><br>
                <input type="text" id="pname" name="pname" value="{{$petInfo->owner_id}}"><br>
                
                <label for="pclassification">Classification:</label><br>
                <input type="text" id="pclassification" name="pclassification" value="{{$petInfo->owner_id}}"><br>
                
                <label for="petAge">Age:</label><br>
                <input type="number" id="petAge" name="petAge" value="{{$petInfo->owner_id}}"><br>
                
                <label for="pbirth">Date of Birth:</label><br>
                <input type="date" id="pbirth" name="pbirth" value="{{$petInfo->owner_id}}"><br><br>
                
                <input type="submit" value="Submit">
                
            </form> 
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
