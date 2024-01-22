Full oAuth2 flow - PHP 8.1
The project is divided into three sub-projects:

The Client
The Auth Server
The Resource Server
To get it working, you'll need to do the following:

Install the dependencies found in each directory. 
1. cd $PROJECT_ROOT/auth_server; composer update 
2. cd $PROJECT_ROOT/client; composer update
3. cd $PROJECT_ROOT/resource_server; composer update
   
Start three separate PHP servers:

1. cd $PROJECT_ROOT;
2. php -S localhost:8000 -t client
3. php -S localhost:8001 -t auth_server
4. php -S localhost:8002 -t resource_server
5. 
Open a browser at http://localhost:8000.

Follow instructions.
* Fixed Json serialization issue for 8.1 PHP
  
Based on:
https://github.com/mchojrin/oauth
https://www.honeybadger.io/blog/oauth-in-php/
