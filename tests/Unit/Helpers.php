<?php

namespace Tests\Unit;

use Tests\TestCase;

class Helpers extends TestCase
{
    public function test_format_date()
    {
        $expected = date('d F Y');
        $actual   = format_date($expected);

        $this->assertSame($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
}
