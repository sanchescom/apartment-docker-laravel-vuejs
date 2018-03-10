# Laravel and Vue.js test from with Docker
This repo contains a Laravel and Vue.js installation setup to use Docker to create a development environment. This repo can be used as a starting point for developing Laravel apps with Docker.

This setup contains;

 - PHP 7.2
 - Nginx
 - MySQL
 - Node.js

## Run
Make sure your have composer and [Docker](https://docs.docker.com/) installed

Clone the repo
```sh
    git clone https://github.com/sanchescom/test-form.git
```
Change directory
```sh
    cd test-form
```
Install dependencies
```sh
    composer install
```
Build and run the Docker containers
```sh
    docker-compose up -d
```
This builds the containers and runs them in the background, while this
```sh
    docker-compose up
```

To check you app http://test-form/
   
   