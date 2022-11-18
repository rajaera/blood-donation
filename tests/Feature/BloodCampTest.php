<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BloodCampTest extends TestCase
{
    protected $authUser;

    public function setup():void {
        parent::setUp();

        $this->authUser = User::find(1);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_auth_user_can_see_camp_list()
    {
        $response = $this->actingAs($this->authUser)->get('/blood-camp');

        $response->assertStatus(200);
    }
}
