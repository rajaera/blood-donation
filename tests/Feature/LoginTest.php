<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
   /**
     * Testing route /login shows the login page if not authenticated
     *
     * @return void
     */
    public function test_show_login_page_if_not_authenticated()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Test login working with correct credentials
     *
     * @return void
     */
    public function test_login_redirect_to_the_home_page_with_correct_credentials()
    {
        $response = $this->post('/login',[
            'email' => 'rajaera@gmail.com',
            'password' => '1982may26'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    /**
     * Test login working with incorrect credentials
     * redirect to root /
     *
     * @return void
     */
    public function test_login_redirect_to_login_page_with_incorrect_credentials()
    {
        $response = $this->followingRedirects()
        ->post('/login',[
            'email' => 'xxxx@gmail.xxx',
            'password' => '1982may26'
        ]);

        $response->assertStatus(200);        
    }
    
}
