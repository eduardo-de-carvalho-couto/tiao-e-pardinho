<x-edit-layout title="Faixas" name="{{$track->name}}" :updateTrack="true" number="{{$track->number}}" duration="{{substr($track->duration, 3, 5)}}" id="{{$track->id}}" :nome="$track->name" :action="route('albums.tracks.update', ['album' => $album->id, 'track' => $track->id])" >
    @section('link-voltar')
        <div class="d-flex justify-content-end position-absolute top-25 end-0 me-5">
            <a href="{{route('albums.tracks.index', $album->id)}}">Voltar para Faixas</a>
        </div>
    @endsection
</x-edit-layout>