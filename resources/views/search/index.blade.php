<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tião e Pardinho</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
    <body>
        <div class="container">
            <div class="container__centralizador">
                <div class="teste">
                    <div class="header">
                        <img src="{{ asset('/img/logo.png') }}" class="header__logo">
                        <h2 class="header__discografia">Discografia</h2>
                    </div>
                    <div class="pesquisar">
                        <form action="{{route('search.index')}}" method="GET">
                            <label for="palavra" class="pesquisar__label">Digite uma palavra chave:</label>
                            <div class="pesquisar__inputEbotao">
                                <input type="text" id="palavra" name="keyword" class="pesquisar__input">
                                <button class="pesquisar__botao">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                    @foreach ($albums as $album)
                        @if ($album->tracks->count() > 0)
                            <div class="albunsEfaixas">
                                <h4 class="albunsEfaixas__titulo">{{$album->name}}</h4>
                                <ul class="faixas">
                                    <li class="faixas__header">
                                        <ul class="faixas__header--numeroEfaixa">
                                            <li>N°</li>
                                            <li>Faixa</li>
                                        </ul>
                                        <ul class="faixas__header--duracao">
                                            <li>Duração</li>
                                        </ul>
                                    </li>
                
                
                                    @foreach ($album->tracks as $track)
                                        <li class="faixas__opcao">
                                            <ul class="faixas__opcao--numeroEfaixa">
                                                <li class="faixas_opcao--numero">{{$track->number}}</li>
                                                <li class="faixas_opcao--nome">{{$track->name}}</li>
                                            </ul>
                                            <ul class="faixas__opcao--duracao">
                                                <li>{{substr($track->duration, 3, 5)}}</li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div style="padding: 120px"></div>
            </div>
        </div>
    </body>
</html>