<?php
namespace phpmongoweb\core;

final class Annotation
{
    public static function extract(): void
    {
        $namespaces = ['controller', 'service'];

        foreach ($namespaces as $namespace) {
            foreach (scandir(App::getSourceFolder() . $namespace) as $item) {
                if (!in_array($item, ['.', '..'])) {
                    $item = substr($item, 0, strlen($item) - 4);
                    var_dump($item);
                    $reflector = new \ReflectionClass("phpmongoweb\\$namespace\\$item");
                    $pattern = '/(@Route\(\")(?P<path>.*)(\"\))/';
                    if (preg_match($pattern, $reflector->getDocComment(), $matches, PREG_OFFSET_CAPTURE)) {
                        var_dump($matches['path'][0]);
                    } else {

                    }
                }
            }
        }
    }
}