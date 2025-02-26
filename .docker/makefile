docker up:
	docker compose -p rest-api up -d --build --force-recreate

docker down:
	docker compose -p rest-api down

phpstan:
	docker exec rest-api vendor/bin/phpstan analyse app

composer-install:
	docker exec rest-api composer install

composer-update:
	docker exec rest-api composer update