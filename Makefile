

.PHONY: up rebuild

up:
	docker-compose up

rebuild:
	docker-compose up --force-recreate
