<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedbackFormTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /*public function testExample()
    {
        $this->assertTrue(true);
    }*/

    public function testBasicExample()
    {
        $this->visit('/')
            ->see('Remember Me');
    }

    public function testManagerLogin()
    {
        $this->visit('/')
            ->type('manager@gmail.com', 'email')
            ->type('manager', 'password')
            ->press('Login')
            ->see('Manager');
    }

    public function testUserLogin()
    {
        $this->visit('/')
            ->type('newuser@gmail.com', 'email')
            ->type('newuser', 'password')
            ->press('Login')
            ->see('Feedback Form');
    }


}
