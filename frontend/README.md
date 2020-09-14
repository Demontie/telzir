# frontend

## Access /src/infrastructure/request.js
```
Replace string YOUR_IP in line 13 to your ip number.

ex:
before const baseUrl = 'http://YOUR_IP:8081/'
before const baseUrl = 'http://192.168.0.0:8081/'
```

## Run this code below to up docker container
```
docker-compose up --build
```

## Enter in container with command below
```
docker exec -it frontend_telzir_frontend_1 sh
```
***In my case the container name was frontend_telzir_frontend_1, check docker ps -a to know the container name.***

## Run
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).


#### This project was built using:
* [Docker](https://www.docker.com/)
* [Vue](https://vuejs.org/)
* [Vuelidate](https://vuelidate.js.org/) library to validate form fields
* [Axios](https://github.com/axios/axios) library to execute requests
* [Bootstrap-vue](https://bootstrap-vue.org/) style library

