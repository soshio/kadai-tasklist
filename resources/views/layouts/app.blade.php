<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TaskList</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        @include('commons.navbar')
        <div class='container'>
            @include('commons.error_messages')
            @yield('content')
        </div>
    </body>
</html>