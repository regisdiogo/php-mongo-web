<?php
namespace phpmongoweb\service;

use phpmongoweb\core\interfaces\service\IConnectionService;
use phpmongoweb\core\interfaces\repository\IConnectionRepository;

class ConnectionService implements IConnectionService {
    private $repository;

    public function __construct(IConnectionRepository $repository) {
        $this->repository = $repository;
    }

    public function getHelloWorld(): string {
        $hello = "Hello Connection Service - " . $this->repository->getHelloWorld();
        return $hello;
    }
}