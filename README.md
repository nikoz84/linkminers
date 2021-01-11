# linkminers

Repositório de código de prueba de Laravel, Nginx, Mysql, Vuejs, Bootstrap 5, conteinerizado con Docker. En guithub encontré un repositório para desenvolver esta aplicación pequeña que tiene dos componetes: web, api.

En la ruta de inicio es el listado en una tabla de departamentos del Perú, donde pueden ser creados y editados con sus respectivas rutas para la API. En el controlador `DepartmentController` se usa para los métodos listados abajo: 

GET /department -> lista de departamentos paginados
GET /department/{id} -> muestra un departamento específico
PUT /department/{id} -> actualiza un departamento
POST /department -> crea un nuevo departamento

En el controlador `WebController` se hayan las rutas web.

GET / -> INICIO
GET /department/{id}


## Instalación de dependencias y servidor embutido localhost 

Si tienes instalado composer y PHP en tu maquina puedes instalar las dependencias de PHP con los comandos

- composer install
- php artisan migrate
- php artisan db:seed

En el caso de querer instalar con el comando `php artisan serve` renombrar el archivo `.env.example` para `.env` y configurar la base de datos 

```conf
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=linkminers
   DB_USERNAME=test
   DB_PASSWORD=secret
```


## Docker e instalación de ambiente de programación paquete PHP, MYSQL, NGINX

Mi dominio de Docker no es del todo experto pero encontré este repositório que me ayudó a configurar el ambiente de programación. La documentación esta en ingles y permite crear un ambiente de programación con Docker el repositorio esta en github.

`https://github.com/supermavster/docker-laravel-8.git` 

## Ports

Ports used in the project:
| Software | Port |
|-------------- | -------------- |
| **nginx** | 8080 |
| **phpmyadmin** | 8081 |
| **mysql** | 3306 |
| **php** | 9000 |
| **xdebug** | 9001 |
| **redis** | 6379 |

## Use

To get started, make sure you have [Docker installed](https://docs.docker.com/) on your system and [Docker Compose](https://docs.docker.com/compose/install/), and then clone this repository.

1. Clone this project:

   ```sh
   git clone https://github.com/supermavster/docker-laravel-8.git
   ```

2. Inside the folder `docker-laravel-8` and Generate your own `.env` to docker compose with the next command:

   ```sh
   cp .env.example .env
   ```

3. You need **Create** or **Put** your laravel project in the folder source; to create follow the next instructions [Here](source/README.md).

4. Build the project whit the next commands:

   ```sh
   docker-compose up --build
   ```

---

## Remember

The configuration of the database **must be the same on both sides** .

```dotenv
# .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_password
DB_ROOT_PASSWORD=secret
```

```dotenv
# source/.env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_user
DB_PASSWORD=db_password
```

The only change is the `DB_HOST` in the `source/.env` where is called to the container of `mysql`:

```dotenv
# source/.env
DB_HOST=mysql
```

---

## Special Cases

To Down and remove the volumes we use the next command:

```sh
docker-compose down -v
```

Update Composer:

```sh
docker-compose run --rm composer update
```

Run compiler (Webpack.mix.js) or Show the view compiler in node:

```sh
docker-compose run --rm npm run dev
```

Run all migrations:

```sh
docker-compose run --rm artisan migrate
```

