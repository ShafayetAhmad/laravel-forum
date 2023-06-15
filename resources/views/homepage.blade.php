<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Homepage</title>
</head>
<body>
    <h1>List of all the students of class {{$class}}</h1>
    <ul>
    @foreach ($students as $student)
        <li>{{$student}}</li>
    @endforeach
    </ul>
    
</body>
</html>