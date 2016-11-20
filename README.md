# Instalacion del Proyecto

1.- Descargar el proyecto del git:
    
    git clone https://github.com/maceuge/qplayLaravel.git
    
2.- Una vez descargado correr el comando del composer dentro de la carpeta para descargar 
    las dependencias y generar la carpeta vendor
    
    composer update
    
3.- Crear la base de datos " qplaydb " desde MySql Worckbrench

4.- Modificar el archivo .env para que se conecte a la base de datos creada

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=qplaydb
    DB_USERNAME={su usuario}
    DB_PASSWORD={su contraseña}
    
5.- Ejecutar las migraciones para creacion de tablas
    
    php artisan migrate
    
6.- Luego ejecute el servidor de Laravel para probar el proyecto, registrando cuenta 
    y ingresando dentro del la pagina principal del User
         
    php artisan serv
         
    
####  Asta aqui es todo por el momento ___________________________




# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
