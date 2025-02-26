restAPI
=================

How to run
------------
cd .docker  
make docker-up  
make docker-down  

pokud chcu něco spustit v dockeru,tak třeba: docker exec rest-api php -v

spuštení phpstan v dockeru:  
docker exec rest-api vendor/bin/phpstan analyse app

