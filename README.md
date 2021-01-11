# linkminers

Repositório de código de prueba de Laravel, Nginx, Mysql, Vuejs, Bootstrap 5, conteinerizado con Docker. En guithub encontré un repositório para desenvolver esta aplicación pequeña que tiene dos componetes: web, api.

En la ruta de inicio es el listado en una tabla de departamentos del Perú, donde pueden ser creados y editados con sus respectivas rutas para la API. En el controlador `DepartmentController` se usa para los métodos listados abajo: 

```
   GET /department -> lista de departamentos paginados
   GET /department/{id} -> muestra un departamento específico
   PUT /department/{id} -> actualiza un departamento
   POST /department -> crea un nuevo departamento
```

En el controlador `WebController` se hayan las rutas web.

```
   GET / -> INICIO
   GET /department/{id}
```

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

## Puertas

Puertas usadas en el proyecto:
| Software | Port |
|-------------- | -------------- |
| **nginx** | 8080 |
| **phpmyadmin** | 8081 |
| **mysql** | 3306 |
| **php** | 9000 |
| **xdebug** | 9001 |
| **redis** | 6379 |

# Levantar la aplicación en Docker

La aplicación laravel esta dentro del directorio `source`. Renombra el archivo `example.env` para `.env` y configura la base de datos:

   ```sh
   cp .env.example .env
   ```

Compila la imagen docker con el siguiente comando:

   ```sh
   docker-compose up --build
   ```

---

## Recuerda

La configuraión del banco de datos **debe ser la misma en los dos lados** .

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

El unico cambio es en  `DB_HOST` en el archivo `source/.env` cuando es llamado el conteiner `mysql` que seria el host, ahi tendrias como accesar al `phpmyadmin` y conectar a la base de datos para laravel:

```dotenv
# source/.env
DB_HOST=mysql
```

---

## Casos especiales

Para iniciar o levantar los containers ejecuta:

```sh
docker-compose up -d
```

Para parar y remover los volumenes usaremos el comando:

```sh
docker-compose down -v
```

Para actualizar las dependencias via `composer` de `PHP`:

```sh
docker-compose run --rm composer update
docker-compose run --rm composer install
```

Para ejecutar el compilador de nodejs (Webpack.mix.js):

```sh
docker-compose run --rm npm run dev
```

Para ejecutar las migraciones:

```sh
docker-compose run --rm artisan migrate
```

Para ejecutar la carga inicial de la base de datos:

```sh
docker-compose run --rm artisan db:seed
```

Si da algun error de session limpia el cache de la aplicación

```sh 
docker-compose run --rm artisan optimize
```