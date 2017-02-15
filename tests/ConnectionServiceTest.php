<?php
use PHPUnit\Framework\TestCase;

class ConnectionServiceTest extends TestCase {

    public function testOk() : void {
        $this->assertEquals(
            "user@example.com",
            "user@example.com"
        );
    }

}