<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;    

class RegisterUserTest extends DuskTestCase
{
   
   /** @test */
    public function check_if_root_site_has_index_content()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Index!');
        });
    }

     /** @test */
    public function check_if_login_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email','glauco@abutua.com')
                    ->type('password','12345678')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }

    /** @test */
    public function check_if_register_is_working()
    {
        $this->browse(function (Browser $browser) {
            //$browser->dump();
            $browser->visit('/register')
                    ->type('name','Teste')
                    ->type('email','glauco6@abutua.com')
                    ->type('password','12345678')
                    ->type('password_confirmation','12345678')
                    ->press('Register')
                    ->assertPathIs('/home');
                   
        });
    }



}

