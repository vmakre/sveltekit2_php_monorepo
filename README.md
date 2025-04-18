# Sveltekit 2  SSG +  php  + crud_orm  monorepo
---
### This repo intention was to make easy application framework for cheap php shared hosts . Php is used as backend , and typescript sveltekit as client frontend. 

Available routes are 
- / - web server "Flightphp" serving javasript application also .
- api/*  - api server for json response "flightphp"
- apiv2/* - apiv2  DB orm dynamic methods for any db crud operations 

## This repo contains
- sveltekit with ssg  adapter-static for only client rendering 

- flightphp  , php micro framework allowing multiple request types as db pdo connection,
simple routing , file uploads , etc..
https://docs.flightphp.com/en/v3/

- php-crud-api   dynamic db orm api server as another api endpoint `apiv2`
https://github.com/mevdschee/php-crud-api


## Installation  :
1. Install all libraries together
``` bash
mkdir project1
cd project1
git clone https://github.com/vmakre/sveltekit2_php_monorepo .
npm i
composer update
```

2. Setup db connection
#### **`.env`**
``` 
APP_ENV=development
DB_TYPE=mysql
DB_HOST=localhost
DB=sakila
DB_USER=root
DB_PASSWORD=


# api endpoints
PUBLIC_CRUD_API=apiv2
PUBLIC_SERVER=http://localhost:8080/

```

3. Start application (now only  works on build mode)
```
# node
npm run build
# php
php -S localhost:8080 -t static/

```

 
4. Generate openapi types and methods
#### **`/src/lib/api/`**
```
 npx openapi-typescript openapi.json -o model_codegen.ts
```


