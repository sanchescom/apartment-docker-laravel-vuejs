# Dockerized Laravel and Vue.js test from

 - PHP 7.2
 - MySQL
 - Vue.js

## Run
Clone the repo
```sh
git clone https://github.com/sanchescom/test-form.git
cd test-form
```
Add host in hosts file
```sh
echo "127.0.0.1 testform.d" >> /etc/hosts
```

For testing email use [mailtrap.io](https://mailtrap.io)
```sh
Login: testfrom773@gmail.com
Password: 12345678__
```
### With a docker
Install [Docker](https://docs.docker.com/) and [Docker Compose](https://docs.docker.com/compose/)

Build and run the Docker containers
```sh
docker-compose up -d && docker-compose up
```

Visit your app at [http://testform.d:8091](http://testform.d:8091/)


### With web server 
Configure web server before


Install PHP
 - PHP >= 7.1.3
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Mbstring PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension
 - Ctype PHP Extension
 - JSON PHP Extension

Install dependencies
```sh
    composer install
```
Install node js and npm
```sh
    install nodejs 
    
    ln -s /usr/bin/nodejs /usr/bin/node
    curl -L https://www.npmjs.com/install.sh --output /var/install.sh
    sh /var/install.sh 
```
Run npm
```sh
    npm run dev
```

   