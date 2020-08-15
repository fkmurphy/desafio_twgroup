## Desafío TWGroup

### Pasos para iniciar el proyecto
Clonar proyecto
```
git clone git@github.com:fkmurphy/desafio_twgroup.git desafiotw-fkmurphy && cd desafiotw-fkmurphy
```

Copiar el archivo example.env para docker-compose
```
cp example.env .env
```

Copiar el archivo .env.example para laravel. (Configure el servidor de email)
```
cp desafiotwg/.env.example desafiotwg/.env
```
Constriuir la imagen y crear los contenedores
```
docker-compose build
docker-compose up -d
```

Instalar paquetes con composer 
```
docker exec -ti app composer install
```

Crear la clave de laravel
```
docker exec -ti app php artisan key:generate
```

Correr migraciones
```
docker exec -ti app sh -c "php artisan migrate"
```


Ya puede registrarse **http://127.0.0.1/**

### Compilar SASS
```
    docker exec -ti app sh -c "npm install && npm run watch"
```


