<?php
namespace phpmongoweb\controller;

/**
 * @RoutePrefix("/api/home")
 */
final class HomeController
{
    public function __construct()
    {
    }

    /**
     * @HttpGet("/hello")
     */
    public function helloWorld() {

    }
}