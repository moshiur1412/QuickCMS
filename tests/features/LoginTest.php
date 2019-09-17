<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testAUserCanLogin()
    {
        $user = factory(User::class)->create([
             'name' => 'Limon',
             'email' => 'limon@example.com', 
             'password' => bcrypt('secret'),
             'role' => 'admin'
        ]);

        $this->visit(route('login'))
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/dashboard');
    }
}
