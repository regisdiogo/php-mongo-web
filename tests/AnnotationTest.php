<?php
use phpmongoweb\core\App;
use PHPUnit\Framework\TestCase;

class AnnotationTest extends TestCase
{
    /**
     * @type \phpmongoweb\core\interfaces\service\IConnectionService
     */
    private $connectionService;

    public function test01(): void
    {
        $this->connectionService = App::getContainer()->resolve('phpmongoweb\core\interfaces\service\IConnectionService');
        $this->connectionService->getHelloWorld();
        $this->assertTrue(true);
    }

    public function test02(): void
    {
        phpmongoweb\core\Annotation::extract();
        $this->assertTrue(true);
    }

}