<?php
use PHPUnit\Framework\TestCase;

class AnnotationTest extends TestCase {

    public function test01() {
        \phpmongoweb\core\annotation\Annotation::extract();
        $this->assertTrue(true);
    }

}