<?php

namespace Modules\GoenDataMaster\Tests\Feature;

use Illuminate\Support\Carbon;
use Modules\Utils\PlanDuration;
use Tests\TestCase;

class PlanDurationTest extends TestCase
{
    /** @test */
    public function plan_duration()
    {
        $plan  = new PlanDuration();
        $start = Carbon::create(2021, 4, 1, 00, 01);
        $end   = Carbon::create(2022, 4, 1, 00, 01);
        Carbon::setTestNow($start);
        $plan->start();
        Carbon::setTestNow($end);
        $plan->finish();
        Carbon::setTestNow();

        $this->assertEquals($plan->duration(), 12);
    }
}
