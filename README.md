# Sveltekit 2  SSG +  php  + crud_orm  monorepo
---
### This repo intention was to make easy application framework for cheap php shared hosts . Php is used as backend , and typescript sveltekit as client frontend. 

Available routes are 
- / - web server "Flightphp" serving javasript application also .
- api/*  - api server for json response "flightphp"
- apiv2/* - apiv2  DB orm dynamic methods for any db crud operations 

## This repo contains
- sveltekit with ssg  adapter-static 
- flightphp  , php micro framework , https://docs.flightphp.com/en/v3/
- php-crud-api   dynamic db CRUD orm api server as another endpoint for example `apiv2`  https://github.com/mevdschee/php-crud-api


## Installation  :
1. Install all together
``` bash
mkdir project1
cd project1
git clone https://github.com/vmakre/sveltekit2_php_monorepo .
npm i
composer update
```

2. Setup db connection
#### **`copy .envexample .env`**
``` 
APP_ENV=development
DB_TYPE=mysql
DB_HOST=localhost
DB=sakila
DB_USER=root
DB_PASSWORD=


# api endpoints php, PUBLIC_  prefix is for svelte client app . Do not put here sensitive informations thi sis browser side!!! 
PUBLIC_CRUD_API=apiv2
PUBLIC_SERVER=http://localhost:8080/

```

3. Start application ( preview mode doesn't work  )
 - In development mode php starts locally on port 8080 , node starts on 5173.
 Vite routes backend calls via proxy "http://localhost:5173/backend"  ->  "http://localhost:8080/"   like in production server
 so we make local node development easy , local web page is "http://localhost:5173" 
 But on production php endpoint is "http://domain.name" withoud port or url suffixes , also client app is in same url.
#### **`local development and debugging on port 5173`**
```
# node
npm run dev
```

- Building app is made in public folder 
#### **`build svelte `**
```
# node
npm run build
```
 

4. Generate openapi types and methods
If you want seamless integration with DB via openapi
#### **`/src/lib/api/`**
```
# get json file  in browser
"http://localhost:8080/apiv2/openapi"

# copy it to /src/lib/api as `openapi.json`
 npx openapi-typescript openapi.json -o model_codegen.ts
```

5. Debugging and code inspection
- PHP can be debugged with XDEBUG extension in vscode ,  and xdebug module enabled in php
"http://localhost:8080/apiv2/.../?XDEBUG_SESSION=VSCODE"
#### **`/.vscode/launch.json`**
```
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/home/directory/projects/sveltekit-php-monorepo": "${workspaceFolder}"
            }
        },
    ]
}
```

- Svelte code inspector , you must have .vscode/settings.json    `"EDITOR": "code"` param ,
then you can press in browser ALT + X  and  mouse click on element 


6. Deploying to self hosted production server
- Copy folders:  src , vendor, public 
- configure web root to public folder
- setup htaccess if needed
- configure php > 8  
- Important  setup .env accordingly to db (this is for php parameters)
#### **`.env`**
```
# api endpoints php, PUBLIC_  prefix is for svelte client app . Do not put here sensitive informations thi sis browser side!!! 
PUBLIC_CRUD_API=apiv2
PUBLIC_SERVER=http://domain.name
```