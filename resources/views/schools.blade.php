<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Schools</title>
    </head>
    <body>
        <h1>Schools</h1>
        <ul>
            @foreach ($schools as $school) 
                <li>{{ $school->name }}</li>
            @endforeach
        </ul>
    </body>
</html>
