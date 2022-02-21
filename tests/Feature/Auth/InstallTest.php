<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class InstallTest extends TestCase
{
    /** @test */
    public function can_not_view_dashboard_page()
    {
        $this->get(route('dashboard'))->assertStatus(302);
    }
}
