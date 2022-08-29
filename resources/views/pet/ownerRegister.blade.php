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
            <form method="post" action="{{ route('saveOwner') }}">                
            {{ csrf_field() }}

                <label> --- Owner Info --- </label><br><br>

                <label for="lname">First name:</label><br>
                <input type="text" id="first_name" name="fname" value=""><br>

                <label for="fname">Middle name:</label><br>
                <input type="text" id="middle_name" name="mname" value=""><br>

                <label for="lname">Last name:</label><br>
                <input type="text" id="last_name" name="lname" value=""><br>
                
                <label for="owner_address">Address</label><br>
                <input type="text" id="owner_address" name="owner_address" value=""><br>

                <label for="owner_email">Email Address:</label><br>
                <input type="email" id="owner_email" name="owner_email" value=""><br>

                <label for="owner_contact_number">Contact Number:</label><br>
                <input type="text" id="owner_contact_number" name="owner_contact_number" value=""><br><br>

                <input type="submit" value="Next">
            <form>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
