
# install build-essential if you cannot run make commands
# example use: 
# make up

env:
	cp .env.example .env
up:
	./vendor/bin/sail up -d
rebuild:
	./vendor/bin/sail up --build -d
recache:
	./vendor/bin/sail artisan config:cache
clear:
	./vendor/bin/sail php artisan cache:clear
	./vendor/bin/sail php artisan config:clear
	./vendor/bin/sail php artisan route:clear
	./vendor/bin/sail php artisan view:clear
restart:
	./vendor/bin/sail restart
stop:
	./vendor/bin/sail stop
migrate:
	./vendor/bin/sail php artisan migrate
fresh:
	./vendor/bin/sail php artisan migrate:fresh
down:
	./vendor/bin/sail down
keygen:
	./vendor/bin/sail php artisan key:generate
seed:
	./vendor/bin/sail php artisan db:seed --class=PermissionSeeder && ./vendor/bin/sail php artisan db:seed --class=AdmininfoSeeder
car:
	./vendor/bin/sail php artisan db:seed --class=CarSeeder
init:
	make env
	make up
	make migrate
	make keygen
	make recache
cd:
	/mnt/c/Users/Owner/Documents/HRMS/'MY FILES'/balili-car-rental-laravel