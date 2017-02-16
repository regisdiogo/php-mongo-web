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
        $repository = "phpmongoweb\\repository\\$repository";
        $this->map->$interface = $repository;
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

    public function addService($interface, $service): void
    {
        $interface = "phpmongoweb\\core\\interfaces\\service\\$interface";
        $service = "phpmongoweb\\service\\$service";
        $this->map->$interface = $service;
    }
}