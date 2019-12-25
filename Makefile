

.PHONY: up server-start server-stop server-rebuild run-tests

up:
	docker-compose up

server-start:
	docker-compose up -d

server-rebuild: server-stop
	docker-compose up --force-recreate

server-stop:
	docker-compose stop


run-tests:
	# docker-compose up -d
	docker-compose exec php-fpm /usr/local/web-app/vendor/bin/phpunit /usr/local/web-app/tests/
	# docker-compose stop
