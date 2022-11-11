<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Tests\TestCase;

class UseregisterTest extends TestCase
{
    protected $authUser;

    public function setup():void {
        parent::setUp();

        $this->authUser = User::find(1);
    }

    /**
     * Test guest user cannot see user list.
     *
     * @return void
     */
    public function test_guest_cannot_see_user_list()
    {
        $response = $this->get('/user');

        $response->assertStatus(302);
    }

    /**
     * Test auth user can see user list.
     *
     * @return void
     */
    public function test_auth_user_can_see_user_list()
    {
        $response = $this->actingAs($this->authUser)->get('/user');

        $response->assertStatus(200);
    }

    /**
     * Test auth user can see register user button at user list.
     *
     * @return void
     */
    public function test_auth_user_can_see__register_user_button_at_user_list()
    {
        $response = $this->actingAs($this->authUser)->get('/user');

        $response->assertSee('Register User');
    }

    /**
     * Test auth user can see user register form.
     *
     * @return void
     */
    public function test_auth_user_can_see__register_form()
    {
        $response = $this->actingAs($this->authUser)->get('/register');

        $response->assertStatus(200);
    }

    /**
     * Test auth user can create new user
     *
     * @return void
     */
    public function test_auth_user_can_create_new_user()
    {

        $data = UserFactory::new()->create();

        $response = $this->actingAs($this->authUser)->post('/register', [
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
            'password_confirmation' => $data->password
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', [
            'name' => $data->name,
            'email' => $data->email 
        ]);
        
    }
}
