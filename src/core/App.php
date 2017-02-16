<?php
namespace phpmongoweb\core;

final class App
{
    private static $container;

    public static function init()
    {
        self::setupAutoload();
        self::configureDependencyInjection();
    }

    public static function getContainer(): DependencyInjection
    {
        return self::$container;
    }

    public static function getSourceFolder(): string
    {
        return substr(__DIR__, 0, strlen(__DIR__) - 4);
    }

    private static function setupAutoload(): void
    {
        spl_autoload_register(function ($className) {
            $className = substr($className, strpos($className, '\\') + 1);
            $namespaces = [
                'core',
                'controller',
                'core\interfaces\repository',
                'core\interfaces\service',
                'core\model',
                'repository',
                'service',
            ];
            foreach ($namespaces as $namespace) {
                if (!$namespace && strpos($className, $namespace) !== 0) {
                    continue;
                } else if (file_exists(self::getSourceFolder() . "$className.php")) {
                    require(self::getSourceFolder() . "$className.php");
                    return;
                }
            }
        });
    }

    private static function configureDependencyInjection()
    {
        self::$container = new DependencyInjection();
        self::$container->addRepository('IConnectionRepository', 'phpmongoweb\repository\ConnectionRepository');
        self::$container->addService('IConnectionService', 'phpmongoweb\service\ConnectionService');
    }
}