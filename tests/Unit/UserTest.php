<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\User;
use Tests\TestCase;
class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertDatabaseHas('users',[
            'email' =>'admin@gmail.com'
        ]);
        // $this->assertTrue(true);
    }
}
