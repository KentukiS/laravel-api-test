### Let's start
<p>git clone https://github.com/KentukiS/laravel-api-service.git</p>

## run command inside project folder
<p>docker run --rm -v $(pwd):/app composer install</p>

## Build project
<p>docker-compose up --build</p>

## After build
<p>docker-compose exec app php artisan key:generate</p>
<p>docker-compose exec app php artisan config:cache</p>

## Enter DB container and create user with privileges
<p>mysql -u root -p</p>
<p>GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY '123456';</p>
<p>FLUSH PRIVILEGES;</p>
<p>EXIT;</p>
<p>exit</p>

## Rename .env.example file in "/" directory in the "app" container and change DB configuration
