<?php

namespace App\Tests;

use App\Controller\Home;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends TestCase
{
    private $sut;

    protected function setUp(): void
    {
        parent::setUp();

        $this->sut = new Home();
    }

    public function testSomething(): void
    {
        self::markTestIncomplete();

        $response = new Response();

        $this->sut->expects($this->once())
            ->method('render')
            ->with(self::isType('string'), self::isType('array'))
            ->willReturn($response);

        $this->sut->__invoke();
    }
}
