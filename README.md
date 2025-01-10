<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Ambiente para desenvolvimento Docker com Laravel 11 e PHP 8.3

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/wsawebmaster/docker-laravel-notes.git
```
```sh
cd docker-laravel-notes
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Acesse o container app
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

Rodar as migrations
```sh
php artisan migrate
```

Saia do container
```sh
exit
```
Acesse o projeto
[http://localhost:8000](http://localhost:8000)

Para testes utilize
Usuários: user1@gmail.com ou user2@gmail.com
Senha: abc123456

---
---
### Se necessário, ajuste as permissões com:

    sudo chmod -R 755 .docker/mysql/dbdata/

### Remover todos os contêineres, redes e volumes definidos no arquivo docker-compose.yml

    docker-compose down

### Remover contêineres, imagens e limpar redes não utilizadas.

    [ "$(docker ps -q)" ] && docker stop $(docker ps -q); [ "$(docker ps -aq)" ] && docker rm $(docker ps -aq); [ "$(docker images -q)" ] && docker rmi $(docker images -q); docker network prune -f


---
---

### 📧 Contato

[LinkedIn](https://www.linkedin.com/in/wsawebmaster/)

[wsawebmaster@yahoo.com.br](mailto:wsawebmaster@yahoo.com.br)