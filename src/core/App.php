<?php
namespace phpmongoweb\core;

final class App {
    public static function init() {
        self::setupAutoload();
    }

    public static function getSourceFolder(): string {
        return substr(__DIR__, 0, strlen(__DIR__) - 4);
    }

    private static function setupAutoload(): void {
        spl_autoload_register(function ($className) {
            $className = substr($className, strpos($className, '\\') + 1);
            $namespaces = [
                'controller',
                'core\annotation',
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
}