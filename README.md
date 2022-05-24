## DWMorgan Technical
Technical code examination for DWMorgan.

This app uses docker for easier setup of dependencies ([Don't have docker yet? Click this link for docker setup](https://docs.docker.com/get-docker/)). To install the app in your machine, please follow the following instructions:

# Installation:
1. Clone the project.
```
λ git clone https://github.com/Prixus/dw-morgan-technical
``` 
2. Change the directory to the cloned project.
```
λ cd dw-morgan-technical
```
3. Run this commands for docker setup.
```
λ docker-compose build
λ docker-compose up -d
```
4. After the building the docker images, run this command to update the app dependencies.
```
λ docker-compose exec --user root php composer install
```
5. Setup the app configurations by following this command. This copy the sample ENV file into our current ENV file.
```
λ cp src/.env.example src/.env
```
6. To setup the database, run the following commands. This will create database tables and seed the csv file.
```
docker-compose exec --user root php php /var/www/html/artisan migrate:fresh --seed
```
7. To app is using localhost and port 8088. To access the app endpoint, please follow the sample link provided:
```
http://localhost:8088/top/confirmed?max_results=10&observation_date=2020-04-14
```
