<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create user</title>
    </head>
    <body>
        <h1>Create User</h1>
        <form action="#"> 
            <select name="schoolId" id="schoolId">
                @foreach ($schools as $school) 
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
        </form>
    </body>
</html>