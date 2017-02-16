<?php
namespace phpmongoweb\controller;

/**
 * @HttpRoute("/api/home/")
 */
final class HomeController
{
    public function __construct()
    {
    }

    /**
     * @HttpGet("")
     */
    public function get()
    {
        return "Hello world";
    }

    /**
     * @HttpGet("id")
     */
    public function getById()
    {
        return "Hello world";
    }

    /**
     * @HttpPost("")
     */
    public function post()
    {
        return "Ok";
    }
}