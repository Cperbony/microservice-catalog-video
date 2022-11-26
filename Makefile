type = patch
comment = Release $(type)
dir := $(shell pwd)
network :=  app-php
container :=  app-php
dirBase := var/www

.PHONY: logs
logs:
	tail -f storage/logs/*


#Entrar Container como root e como user id
.PHONY: ssh-root
ssh-root:
	docker exec -it $(container) sh

.PHONY: ssh-user
ssh-user:
	docker exec -it --user=$(shell id -u):www-data $(container) sh