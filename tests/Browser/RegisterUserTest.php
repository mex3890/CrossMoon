<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class RegisterUserTest extends DuskTestCase
{
    /**
     * @throws Throwable
     */
    public function test_check_if_register_is_working()
    {
        $name = 'test';
        $email = 'email';
        $random = random_int(1, 100);
        $name = $name . $random;
        $email = $email . $random . '@email.com';
        $this->browse(function (Browser $browser) use ($name, $email){
            $browser->visit('/register')
                ->type('name', $name)
                ->type('email', $email)
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->press('Register')
                ->assertPathIs('/home')
                ->assertSee('Assignments');
        });
    }
}
