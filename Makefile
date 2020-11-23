up:
	docker-compose up -d

down:
	docker-compose down

install: up
	docker run --rm --interactive --tty --volume ${PWD}/application:/app composer install
	docker-compose exec php-fpm bin/console doctrine:migrations:migrate --no-interaction
	docker-compose exec php-fpm bin/console doctrine:fixtures:load --no-interaction
