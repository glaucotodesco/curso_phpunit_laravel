<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class RegisterUserTest extends DuskTestCase
{
   

    public function setUp():void
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }
    }

   /** @test */
    public function check_if_root_site_has_index_content()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Index!');
        });
    }

    
    /** @test */
    public function check_if_navmenu_site_has_content()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/projects')->assertSee('Projects!')
                    ->visit('/about')->assertSee('About!')
                    ->visit('/services')->assertSee('Services');
                    
        });
    }

     /** @test */
    public function check_if_login_is_working()
    {
        $this->browse(function (Browser $browser) {

            $user = User::where('email','teste1@teste.com')->first();

            if($user == null)
            $user = User::factory()->create([
                'email'     => 'teste1@teste.com',
                'name'      => 'Teste'
            ]);

      

            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password','password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->logout();
                    
                    
        });
    }

    /** @test */
    public function check_if_register_is_working()
    {
        $this->browse(function (Browser $browser) {
            //$browser->dump();

            $user = User::where('email','teste2@teste.com')->first();

            if ($user) {
                $user->forceDelete();
            }
            
            $browser->visit('/register')
                    ->type('name','Teste2')
                    ->type('email','teste2@teste.com')
                    ->type('password','password')
                    ->type('password_confirmation','password')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->logout();
                   
        });
    }



}

