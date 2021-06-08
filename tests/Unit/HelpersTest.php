<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Carbon;

class HelpersTest extends TestCase
{
    /** @test */
    public function can_format_date()
    {
        $today = Carbon::today()->translatedFormat('Y-m-d');
        $date = format_date($today);

        $this->assertSame(Carbon::today()->translatedFormat('d F Y'), $date);
        $this->assertEquals(Carbon::today()->translatedFormat('d F Y'), $date);
    }

    /** @test */
    public function can_remove_idr_format()
    {
        $idr = "Rp 100.000";
        $expected = 100000;
        $actual = clean_currency_format(trim(substr($idr, strpos($idr, "Rp") + 2)));

        $this->assertSame($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
}
