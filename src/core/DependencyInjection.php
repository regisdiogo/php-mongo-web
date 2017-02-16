<?php
namespace phpmongoweb\core;

final class DependencyInjection
{
    private $map;

    public function __construct()
    {
        $this->map = (object)array();
    }

    public function addRepository($interface, $repository): void
    {
        $interface = "phpmongoweb\\core\\interfaces\\repository\\$interface";
        $this->map->$interface = $repository;
    }

    public function addService($interface, $service): void
    {
        $interface = "phpmongoweb\\core\\interfaces\\service\\$interface";
        $this->map->$interface = $service;
    }

    public function addInstance($type, $instance): void
    {
        throw new \Exception('Not implemented');
    }

    public function resolve($interface)
    {
        if (!isset($this->map->$interface)) {
            return null; //TODO Throw exception
        }
        $reflector = new \ReflectionClass($this->map->$interface);
        if ($reflector->hasMethod('__construct')) {
            $args = array();
            foreach ($reflector->getMethod('__construct')->getParameters() as $parameter) {
                $args[$parameter->name] = App::getContainer()->resolve($parameter->getType()->__toString());
            }
            return $reflector->newInstanceArgs($args);
        }
        return $reflector->newInstance();
    }
}