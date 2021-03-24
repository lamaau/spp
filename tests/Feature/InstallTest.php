<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstallTest extends TestCase
{
    /** @test */
    public function can_not_view_home_page()
    {
        $this->get(route('home'))->assertStatus(302);
    }
}
