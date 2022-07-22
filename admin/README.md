# Create .env file for config docker
```
$ cp .env.example .env
```
# Docker
```
$ docker-compose up -d --build

```

# Composer install
```
$ docker-compose exec app composer install

```
# Copy .env of app
```
$cd src

$cp .env.example .env

```
# Config DB in .env 
```
DB_CONNECTION=mysql
DB_HOST=coffee-db
DB_PORT=3010
DB_DATABASE=coffee_database
DB_USERNAME=homestead
DB_PASSWORD=secret

```

# Migrate and seed data
```
$ docker-compose exec app ash

[/work/app]

$php artisan storage:link

$php artisan key:generate

$php artisan migrate

$php artisan db:seed

```

# Access admin site in local

```
http://localhost:8888/admin

admin@gmail.com/12345678

```