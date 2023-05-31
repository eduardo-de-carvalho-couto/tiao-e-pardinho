<x-layout title="Álbuns" :mensagem-sucesso="$mensagemSucesso" :update="false" :action="route('albums.store')">

    <ul class="list-group">
        @foreach ($albums as $album)
            <li class="list-group-item d-flex justify-content-between align-items-center">
    
                <a href="{{route('albums.tracks.index', $album->id)}}">{{ $album->name }}</a>
    
                <span class="d-flex">
                    <a href="{{route('albums.edit', $album->id)}}" class="btn btn-primary btn-sm">
                        Editar
                    </a>
                    
                    <form action="{{ route('albums.destroy', $album->id) }}" method="post" class="ms-2">
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
</x-layout>