<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
    <body>
        <div class="container position-relative">
            <div class="p-5 bg-dark text-white mb-3">
                <h1>{{ $title }}</h1>
            </div>

            @isset($mensagemSucesso)
                <div class="alert alert-success">
                    {{ $mensagemSucesso }}
                </div>
            @endisset

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('link-voltar')
    
            <form action="{{ $action }}" method="POST">
                @csrf
        
                <div class="mb-5">
                    <h5>Adicione {{$adicione}}:</h5>
                    <div class="row">
                        <div class="col-4">
                            <label for="album" class="form-label">Nome:</label>
                            <input type="text" class="form-control me-2" id="album" name="name" value="{{old('name')}}">
                        </div>
                        @if($update)
                            <div class="col-1">
                                <label for="number" class="form-label">Número:</label>
                                <input type="text" class="form-control me-2" id="number" name="number" value="{{old('number')}}">
                            </div>
                            <div class="col-1">
                                <label for="duration" class="form-label">Duração:</label>
                                <input type="text" class="form-control me-2" id="duration" name="duration" value="{{old('duration')}}">
                            </div> 
                        @endif
                        <div class="col-1 d-flex align-items-end">
                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </div>
                    </div>
                </div>
            </form>
            
            {{ $slot }}
        </div>
    </body>
</html>