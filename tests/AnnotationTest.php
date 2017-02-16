<?php
use phpmongoweb\core\App;
use PHPUnit\Framework\TestCase;

class AnnotationTest extends TestCase {

    public function test01() {
        //\phpmongoweb\core\Annotation::extract();
        $service = App::getContainer()->resolve('phpmongoweb\core\interfaces\service\IConnectionService');
        var_dump($service);
        $this->assertTrue(true);
    }

}