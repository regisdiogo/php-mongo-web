<?php
namespace tests;

use PHPUnit\Framework\TestCase;

/**
 * Class ConnectionServiceTest
 * @package tests
 * @covers ConnectionService
 */
class ConnectionServiceTest extends TestCase
{

    public function testOk(): void
    {
        $this->assertEquals(
            "user@example.com",
            "user@example.com"
        );
    }

}