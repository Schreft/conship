<?php

use Orchestra\Testbench\TestCase;
use Marcionunes\Conship\Conship;

class ConshipTest extends TestCase
{
    /**
     * @test
     */
    public function folder()
    {
        $conship = (new Conship(__DIR__ . '/../Constants'));

        $data = $conship->toArray();

        dd($data);
    }
}
