<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="p-5 bg-dark text-white mb-3">
            <h1>Editar {{ $title }}</h1>
        </div>

        <form action="{{route('albums.update', $id)}}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="album" class="form-label">Edite o {{$name}}:</label>
                <div class="d-flex">
                    <input type="text" class="form-control me-2" id="album" name="name" value="{{old('name')}}">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </form>

        {{ $slot }}
    </div>
</body>
</html>