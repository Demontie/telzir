# backend

#### Run this command to up PHP project:
```
docker-compose up
```
***This will download all dependencies and create the database with all data needed.***

#### This project was built using:
* [Docker](https://www.docker.com/)
* [Composer](https://getcomposer.org/)
* [PlugRoute v3.9](https://github.com/erandirjunior/plug-route) my route library for PHP
* [PHPUnit 9](https://phpunit.de/) library to run tests
* MySQL database
* PDO
* The structure was based in clean architecture


## Run test

#### Enter in container
```
docker exec -it backend_site_telzir_1 bash
```
***In my case the container name was backend_site_telzir_1, check docker ps -a to know the container name.***

#### Follow to project folder
```
cd /var/www/html
```

#### Run the command below to execute test
```
composer run-script test
```