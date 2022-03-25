# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)


## Article API(Lumen)
  
Lumen was used to develop the application because it is a mordern web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:  
  
- [Simple, fast routing engine](https://laravel.com/docs/routing).  
- [Powerful dependency injection container](https://laravel.com/docs/container).  
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.  
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).  
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).  
- [Robust background job processing](https://laravel.com/docs/queues).  
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).  
  
Laravel Lumen is accessible, powerful, and provides tools required for large, robust applications 
  
##  Project Setup
 In order to setup the application locally on you system. 
   1. clone the repository 
   2. `git clone https://github.com/willypelz/workwise.git`  
   3. cd into the project directory 
   4. `cd workwise/task-two/www` 
   5. install the dependencies for the application
   6. `composer install`
   7.  create a .env file from the .env.example 
   11. create a database called `Your-database-name` in your database 
   12. update the env files with your mysql connection details that you have on your system 


    DB_CONNECTION=mysql  
    DB_HOST=YOUR_HOST  
    DB_PORT=MYSQL_PORT  
    DB_DATABASE=Your-database-name  
    DB_USERNAME=MYSQL_USER_NAME  
    DB_PASSWORD=MYSQL_PASSWORD
    
15. Running migration data into the database 
16. `php artisan migrate`
17. serving the project 
18. `php -S localhost:8000 -t public`

##  Testing the Application 
**Application Testing**  is defined as a software  **testing**  type, conducted through scripts with the motive of finding errors in software. It deals with  **tests**  for the entire  **application**. It helps to enhance the quality of your  **applications**  while reducing costs, maximizing ROI, and saving development time.

In order to run the feature test that was written 
	`php ./vendor/bin/phpunit`


##  Testing the Application (user testing)
```
create articles: | POST |  /articles
edit article      | PUT | /articles/:id
list articles | GET | /articles
view article | GET | /articles/:id
delete article | DELETE | /articles/:id
```


# Updates

1. There are still advance optimization and refactoring that can still be done in this project

Pending Update:

1. Completion of docker setup
2. Completion of Feature test
3. Pagination. 
 
 
# Developer(Softwaredef)

1. Name: Asefon Michael Pelumi 
2. Nickname: Softwaredef
3. Mail: pelumiasefon@gmail.com

Thanks. If you have any problem setting it up or complain you can kindly post them on issues or message me directly
