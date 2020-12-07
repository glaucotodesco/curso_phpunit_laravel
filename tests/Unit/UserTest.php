<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

use function PHPUnit\Framework\assertEquals;

//https://www.youtube.com/playlist?list=PLfdtiltiRHWGXSggf05W-pJbD47-_d8bJ


class UserTest extends TestCase
{
    protected $user;

    public function setUp():void
    {
        $this->user = new User();
        echo "\nTeste setUp";
    }
    
    /** @test */
    public function checkIfUserColumnsIsCorrect()
    {
       
        $expected = ['name','email','password'];
        $results = array_diff($expected, $this->user->getFillable());
        $this->assertEquals(0, count($results));
    }

    /** @test */
    public function checkIfFullNameIsCorrect(){
        
        $this->user->name = 'Glauco';
        $this->user->lastName = 'Todesco';

        assertEquals('Glauco Todesco',$this->user->getFullName());
        
    }


}
