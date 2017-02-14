<?php
namespace phpmongoweb\core;

final class App {
    public static function init() {
        p([$_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]]);
        self::setupAutoload();
    }

    private static function setupAutoload() {
        spl_autoload_register(function ($className) {
            $sourceFolder = substr(__DIR__, 0, strlen(__DIR__) - 4);
            $className = substr($className, strpos($className, "\\") + 1);
            $namespaces = [
                "core\\interfaces\\repository",
                "core\\interfaces\\service",
                "core\\model",
                "repository",
                "service"
            ];
            foreach ($namespaces as $namespace) {
                if (!$namespace && strpos($className, $namespace) !== 0) {
                    continue;
                } else if (file_exists($sourceFolder . $className . ".php")) {
                    require($sourceFolder . $className . ".php");
                    return;
                }
            }
        });
    }
}