<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegisterLoginTest extends DuskTestCase
{
    public function setUp():void
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }
    }

     /** @test */
    public function check_ifLogin_isWorking()
    {
        $this->browse(function (Browser $browser) {

            $user = User::where('email', 'teste1@teste.com')->first();

            if ($user != null) {
                $user->delete();
            }

            $user = User::factory()->create([
                'email'     => 'teste1@teste.com',
                'name'      => 'Teste'
            ]);

            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->logout();
        });
    }

    /** @test */
    public function check_ifRegister_isWorking()
    {
        $this->browse(function (Browser $browser) {
             $user = User::where('email', 'teste2@teste.com')->first();

            if ($user) {
                $user->forceDelete();
            }
            
            $browser->visit('/register')
                    ->type('name', 'Teste2')
                    ->type('email', 'teste2@teste.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('Register')
                    ->assertPathIs('/home')
                    ->assertSee("You are logged in!")
                    ->logout();
        });
    }
}
