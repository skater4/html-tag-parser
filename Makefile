up:
	docker-compose config -q && \
	docker-compose up -d --force-recreate

down:
	docker-compose config -q && \
	docker-compose down

build:
	docker-compose config -q && \
	docker-compose build --pull

composer-install:
	docker-compose config -q && \
	docker-compose exec php composer install