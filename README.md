# TvMaze Search API

## Installation

####  1. First, clone this repository:

```bash
$ git clone https://github.com/RahatHameed/fashionette.git
```
####  2. Kindly add following entry in your `/etc/hosts` file:

```bash
127.0.0.1 json-api.local
```

####  3. Create docker containers:

```bash
$ docker-compose up -d
```

#### 4. Confirm three running containers for db, php-fpm, nginx:

```bash
$ docker-compose ps 
```

#### 5. Install composer packages:

```bash
$ docker-compose run php composer install 
```

#### 6. Create Database schema:

```bash
$ docker-compose run php php artisan migrate 
```

####  7. Run testcases:

```bash
$ docker-compose run php vendor/bin/phpunit
```

#### 8. Get Api Call:
```bash
http://json-api.local/?q={show_title}
```

#### 9. Possible Future Enhancement:
- We can add Authentication in future if required.
- We can allow passing more parameters to filter our response.
- We can extend our code to integrate more Apis like TvMaze
- We can use other caching tools like redis or memcache.

Application logs can be found on following locations:
```bash
  logs/nginx/
  logs/application/
```
