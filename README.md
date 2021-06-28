# Curso Laravel Microservices com RabbitMQ (micro 01)
[Saiba Mais Sobre o Curso](https://patreon.com/taylorotwell)

### Instalação
Clonar Projeto
```sh
git clone https://github.com/especializati/laravel-microservice-01.git
```

Acessar o projeto
```sh
cd laravel-microservice-01
```

Criar o Arquivo .env
```sh
cp .env.example .env
```

Atualizar as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=EspecializaTi
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db_micro_01
DB_PORT=3306
DB_DATABASE=micro_01
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Subir os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec micro_01 bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Rodar os testes
```sh
php artisan test
```

Acessar o projeto
[http://localhost:8000](http://localhost:8000)
