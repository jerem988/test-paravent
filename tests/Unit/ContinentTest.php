<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
Use App\Classes\Continent;

class ContinentTest extends TestCase
{
    public function testMinWidth()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Width ne peut pas être inferieur à 1 ; "0" renseigné');
        new Continent(0, '1');
    }

    public function testMaxWidth()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Width ne peut pas être superieur à 100000 ; "999999" renseigné');
        new Continent(999999, '1');
    }

    public function testInvalidTerrain()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Le terrain ne peut pas être plus large que le continent');
        new Continent(1, '1 2');
    }

    public function testInvalidHeightType()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Height Invalide ; "toto" renseigné');
        new Continent(1, 'toto');
    }

    public function testNegativeHeight()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Height ne peut pas être inférieur à 0 ; "-1" renseigné');
        new Continent(1, '-1');
    }

    public function testMaxHeight()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Height ne peut pas être supérieur à 100000 ; "999999" renseigné');
        new Continent(1, '999999');
    }

    public function testExecutionTime()
    {
        $timeStart = microtime(true);
        $continent = new Continent(10, '30 27 17 42 29 12 14 41 42 42');
        $continent->getSurfaceAbriDisponible();
        $timeEnd = microtime(true);
        $this->assertLessThan(500, floor(($timeEnd - $timeStart) * 1000));
    }

    public function testGetSurfaceAbriDisponible()
    {
        $continent = new Continent(10, '30 27 17 42 29 12 14 41 42 42');
        $this->assertEquals(6, $continent->getSurfaceAbriDisponible());
    }
}
