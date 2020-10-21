<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NavMenuTest extends TestCase
{
    public function test_redirect_for_logout_users_to_login()
    {
        $response = $this->get('/home')->assertRedirect('/login');
        
    }
    
    
    public function test_global_routes_for_all_users()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/about');
        $response->assertStatus(200);

        $response = $this->get('/projects');
        $response->assertStatus(200);

        $response = $this->get('/services');
        $response->assertStatus(200);

        $response = $this->get('/login');
        $response->assertStatus(200);

        $response = $this->get('/register');
        $response->assertStatus(200);

        $response = $this->get('/password/reset');
        $response->assertStatus(200);
    }



}
