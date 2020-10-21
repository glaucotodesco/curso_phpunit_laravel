<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
   
    public function test_check_if_user_columns_is_correct()
    {
        $user = new User();
        $expected = ['name','email','password'];
        $results = array_diff($expected,$user->getFillable());
        //dd($results);
        $this->assertEquals(0,count($results));
    }
}
