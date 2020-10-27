<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteLogoutTest extends TestCase
{
   
    /** @test */
    public function checkRoutesForAllLogoutUserExist()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/about')->assertStatus(200);
        $this->get('/projects')->assertStatus(200);
        $this->get('/services')->assertStatus(200);
        $this->get('/login')->assertStatus(200);
        $this->get('/register')->assertStatus(200);
        $this->get('/password/reset')->assertStatus(200);

        //Tem que estar logado
        $this->get('/home')->assertRedirect('/login');
    }
}
