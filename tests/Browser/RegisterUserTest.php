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
   

    /** @test */
    public function check_ifRegister_isWorking()
    {
        $this->browse(function (Browser $browser) {
                   
        });
    }



}

