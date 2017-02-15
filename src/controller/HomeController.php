<?php
namespace phpmongoweb\controller;

/**
 * @Route("/api/home/")
 */
final class HomeController
{
    public function __construct()
    {
    }

    /**
     * @HttpGet("")
     */
    public function get() {
        return "Hello world";
    }
}