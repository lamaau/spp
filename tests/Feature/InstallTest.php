<?php

namespace Tests\Feature;

use Tests\TestCase;

class InstallTest extends TestCase
{
    /** @test */
    public function can_not_view_home_page()
    {
        $this->get(route('dashboard'))->assertStatus(302);
    }
}
