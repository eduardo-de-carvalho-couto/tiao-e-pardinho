<x-layout title="Álbuns">
    <div class="container">
        <div class="p-5 bg-dark text-white mb-3">
            <h1>Álbuns</h1>
        </div>

        <form action="{{route('albums.store')}}" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="album" class="form-label">Adicione um álbum:</label>
                <div class="d-flex">
                    <input type="text" class="form-control me-2" id="album" name="name" value="{{old('name')}}">
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </div>
        </form>
        
        <ul class="list-group">
            @foreach ($albums as $album)
                <li class="list-group-item d-flex justify-content-between align-items-center">
        
                    <a href="#">{{ $album->name }}</a>
        
                    <span class="d-flex">
                        <a href="#" class="btn btn-primary btn-sm">
                            Editar
                        </a>
                        
                        <form action="" method="post" class="ms-2">
                            @csrf
                            @method('DELETE')
            
                            <button class="btn btn-danger btn-sm">
                                Deletar
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @endpush
</x-layout>