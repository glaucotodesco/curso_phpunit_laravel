<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    
    /** @test */
    public function check_ifUserColumns_isCorrect()
    {
        $user = new User();
        $expected = ['name','email','password'];
        $results = array_diff($expected, $user->getFillable());
        $this->assertEquals(0, count($results));
    }
}
