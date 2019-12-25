<?php
namespace YourNamespace;

use DI\Container;


class App {
    private static $__INSTANCE;


    private $container;


    public static function create() {
        if (!self::$__INSTANCE) {
            $className = get_called_class();
            self::$__INSTANCE = new $className();
        }

        return self::$__INSTANCE;
    }


    private function __construct() {
        $this->container = new Container();

        // TODO: Add services to the container here
        /****
        $this->container->set(BasketService::class, function (Container $c) {
            return new BasketService();
        });
        ****/
    }


    public function getContainer() {
        return $this->container;
    }

}