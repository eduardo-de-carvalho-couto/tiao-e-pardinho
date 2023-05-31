<x-layout title="Faixas" :mensagem-sucesso="$mensagemSucesso" :update="true" :action="route('albums.tracks.store', $album)">
    
    @section('link-voltar')
        <div class="d-flex justify-content-end position-absolute top-25 end-0 me-5">
            <a href="{{route('albums.index')}}">Voltar para Álbuns</a>
        </div>
    @endsection
    
    <ul class="list-group">
        <li class="row d-flex pb-2">
            <span class="col-3  ms-3">
                <strong>Nome</strong>
            </span>
            <span class="col-3  ms-3">
                <strong>Número</strong>
            </span>
            <span class="col-3  ms-4">
                <strong>Duração</strong>
            </span>
        </li>
        @foreach ($tracks as $track)
            <li class="list-group-item d-flex justify-content-between align-items-center">
    
                <span>{{ $track->name }}</span>
                <span>{{ $track->number }}</span>
                <span class="me-3">{{ substr($track->duration, 3, 5) }}</span>
    
                <span class="d-flex">
                    <a href="{{route('albums.tracks.edit', ['album' => $album->id, 'track' => $track->id])}}" class="btn btn-primary btn-sm">
                        Editar
                    </a>
                    
                    <form action="{{ route('albums.tracks.destroy', ['album' => $album->id, 'track' => $track->id]) }}" method="post" class="ms-2">
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