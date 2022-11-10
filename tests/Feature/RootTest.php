<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RootTest extends TestCase
{
    /**
     * Testing root redirect to the login page
     *
     * @return void
     */
    public function test_root_request_redirect_to_login()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }
}
