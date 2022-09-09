### Let's start
git clone https://github.com/KentukiS/laravel-api-service.git

## Create new folder and run command inside
docker run --rm -v $(pwd):/app composer install

## Build project
docker-compose up --build

## After build
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan config:cache

## Enter DB container and create user with privileges
mysql -u root -p
GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY '123456';
FLUSH PRIVILEGES;
EXIT;
exit

## Rename .env.example file in "/" directory in the "app" container and change DB configuration
