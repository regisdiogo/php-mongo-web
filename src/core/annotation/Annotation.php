<?php
namespace phpmongoweb\core\annotation;

use phpmongoweb\core\App;

final class Annotation {
    public static function extract(): void {
        $namespaces = ['controller'];

        foreach ($namespaces as $namespace) {
            foreach (scandir(App::getSourceFolder() . $namespace) as $item) {
                if (!in_array($item, ['.', '..'])) {
                    $item = substr($item, 0, strlen($item) - 4);
                    $reflector = new \ReflectionClass("phpmongoweb\\$namespace\\$item");
                    $pattern = '/(@Route\(\")(?P<path>.*)(\"\))/';
                    preg_match($pattern, $reflector->getDocComment(), $matches, PREG_OFFSET_CAPTURE);
                    var_dump($matches['path'][0]);
                    var_dump($reflector->getMethods());
                    echo $item;
                }
            }
        }
    }
}