<?php

use Orchestra\Testbench\TestCase;
use Schreft\Conship\Conship;

class ConshipTest extends TestCase
{
    /**
     * @test
     */
    public function folder()
    {
        $conship = (new Conship(__DIR__ . '/../Constants'));

        $data = $conship->toArray();

        $this->assertArrayHasKey("folder", $data);
    }
}
