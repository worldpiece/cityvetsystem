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
            <form action="/action_page.php">
                {{ csrf_field() }}

                <label for="lname">--- Pet Info ---</label><br><br>

                <label for="fname">Name:</label><br>
                <input type="text" id="fname" name="fname" value=""><br>

                <label for="fname">Classification:</label><br>
                <input type="text" id="fname" name="fname" value=""><br>

                <label for="fname">Age:</label><br>
                <input type="text" id="fname" name="fname" value=""><br>

                <label for="fname">Date of Birth:</label><br>
                <input type="text" id="fname" name="fname" value=""><br><br>

                <input type="submit" value="Submit">

            </form>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
