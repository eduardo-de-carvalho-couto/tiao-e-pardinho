# Tião Carreiro e Pardinho

As opções de Inserir, Atualizar e Deletar estão no path /albums. Decidi deixar essa parte separado da página que visualiza albuns pesquisados por palavra chave e suas faixas.

## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/eduardo-de-carvalho-couto/tiao-e-pardinho.git
```
```sh
cd tiao-e-pardinho/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


**Se preferir**, atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="App Name"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rode as migrations
```sh
php artisan migrate
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)
