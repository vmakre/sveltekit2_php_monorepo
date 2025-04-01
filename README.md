# Sveltekit 2  +  php  + crud_orm  monorepo
---
### This repo intention was to make easy application framework for cheap php shared hosts . Php is used as backend , and typescript sveltekit as client frontend. 

Available routes are 
- / - web server "Flightphp" serving javasript application also .
- api/*  - api server for json response "flightphp"
- apiv2/* - apiv2  DB orm dynamic methods for any db crud operations 

## This repo contains
- sveltekit with ssg  adapter-static for  client rendering site
 https://svelte.dev/

- flightphp  , php micro framework allowing multiple request type as db pdo connection,
simple routing , file uploads , etc..
https://docs.flightphp.com/en/v3/

- php-crud-api   dynamic db orm api server as another api endpoint
https://github.com/mevdschee/php-crud-api


## Installation in empty folder :
1. Install all libraries together
``` bash

git clone https://github.com/vmakre/sveltekit2_php_monorepo .

npm i

composer update

```

2. Setup db connection
#### **`/src/server/routes/index.php`**
``` php
// db connect mysql
$host='localhost';
$user='root';
$pass='';
$db='tablename';

```

3. Start application (now only  works on build mode)
```
# node
npm run build
# php
php -S localhost:8080 -t static/

```

 



