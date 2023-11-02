<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-color: lightblue;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <h1>
        Nuovo progetto {{$project->published ? 'pubblicato' : 'rimosso'}} !
    </h1>
    <h2>{{$project->title}}</h2>
</body>

</html>