install:
	cp docker-compose.dev.yml docker-compose.yml &&\
	docker-compose up -d &&\
	cd www/site &&\
	cp .env.example .env &&\
	composer install &&\
	php artisan key:generate &&\
	php artisan migrate &&\
	npm install &&\
	npm run dev
