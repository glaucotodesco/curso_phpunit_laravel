<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RotasTest extends DuskTestCase
{
     /** @test */
     public function check_ifRootSite_hasIndexContent()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/')
                     ->assertSee('Index!');
         });
     }

       /** @test */
    public function check_ifRotas_hasContent()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/projects')->assertSee('Projects!')
                    ->visit('/about')->assertSee('About!')
                    ->visit('/services')->assertSee('Services!');
                    
        });
    }
}
