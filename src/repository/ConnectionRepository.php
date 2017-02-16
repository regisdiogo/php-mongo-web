<?php
namespace phpmongoweb\repository;

use phpmongoweb\core\interfaces\repository\IConnectionRepository;

class ConnectionRepository implements IConnectionRepository
{
    public function getHelloWorld(): string
    {
        return "Hello Connection Repository";
    }
}