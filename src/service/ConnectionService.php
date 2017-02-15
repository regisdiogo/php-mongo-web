<?php
namespace phpmongoweb\service;

use phpmongoweb\core\interfaces\service\IConnectionService;

class ConnectionService implements IConnectionService {

    public function helloWorld() : string {
        return "Hello world";
    }

}