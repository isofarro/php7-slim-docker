php-docker
==========

Docker-based development system for PHP-7 apps. Provides a Slim micro-framework skeleton with Twig enabled.

Currently requires composer to run locally.

## Slim configuration

* Self-contained application in `src/App.php` which uses `DI\Container` for it's services
* Slim instantiated with our App's container.
* `view` service in the container is a Twig instance
* TwigMiddleware configured so that `url_for()` availble in templates for route-based URL creation
* Web app runs on port 8080 of localhost

## Directories

* `var/htdocs` -- document root for static assets
* `var/views` -- Twig templates
* `var/routes` -- Slim routes/controllers
* `tmp/cache/views` -- Twig template cache
* `etc/config/nginx.docker.config` -- nginx configuration
* `src/App.php` -- base of the pure application


## Set-up

### Dev domain configuration

In `/etc/hosts` add the following:

    127.0.0.1   php-docker.local

### Install

Assumes composer is installed on the host

    composer install


## Getting started

    make up

Open browser and go to `http://php-docker.local:8080/hello/world`

