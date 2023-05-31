<x-edit-layout title="Álbum" name="{{$album->name}}" id="{{$album->id}}" :updateTrack="false" :nome="$album->name" :action="route('albums.update', $album->id)">
    @section('link-voltar')
        <div class="d-flex justify-content-end position-absolute top-25 end-0 me-5">
            <a href="{{route('albums.index')}}">Voltar para Álbuns</a>
        </div>
    @endsection
</x-edit-layout>