<?php

use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{

    public function testShouldReturnParam(): void
    {
        $request = new Request(['limit' => '5'], $_POST, $_SERVER);

        $this->assertEquals(
            '5',
            $request->getParam('limit')
        );

    }

    public function testShouldReturnDefaultValue(): void
    {
        $request = new Request(['limit' => '5'], $_POST, $_SERVER);
        $this->assertEquals(
            '10',
            $request->getParam('invalidParam', 10)
        );

    }

    public function testShouldReturnDefaultNull(): void
    {
        $request = new Request(['limit' => '5'], $_POST, $_SERVER);
        $this->assertEquals(
            null,
            $request->getParam('invalidParam',)
        );

    }

}