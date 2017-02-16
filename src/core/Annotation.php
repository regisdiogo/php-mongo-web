<?php
namespace phpmongoweb\core;

final class Annotation
{
    public static function extract(): void
    {
        $routes = array();
        foreach (scandir(App::getSourceFolder() . 'controller') as $class) {
            if (!in_array($class, ['.', '..'])) {
                $class = 'phpmongoweb\controller\\' . substr($class, 0, strlen($class) - 4);
                $reflector = new \ReflectionClass($class);
                $pattern = '/(@HttpRoute\(\")(?P<path>.*)(\"\))/';
                if (preg_match($pattern, $reflector->getDocComment(), $m1, PREG_OFFSET_CAPTURE)) {
                    $baseRoute = $m1['path'][0];
                    foreach ($reflector->getMethods() as $method) {
                        if ($method->getDocComment() !== false) {
                            $pattern = '/(@Http)(?P<verb>.*)(\(\")(?P<path>.*)(\"\))/';
                            if (preg_match($pattern, $method->getDocComment(), $m2, PREG_OFFSET_CAPTURE)) {
                                if (!isset($routes[strtoupper($m2['verb'][0])])) {
                                    $routes[strtoupper($m2['verb'][0])] = array();
                                }
                                $routes[strtoupper($m2['verb'][0])][$baseRoute . $m2['path'][0]] = $class . '::' . $method->getName();
                            }
                        }
                    }
                }
            }
        }
        var_dump($routes);
    }
}