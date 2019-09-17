<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class StaticControllerTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testDashboard()
    {
        
        $this->visit('/dashboard')
             ->see('Mail')
             ->see('Total Pages')
             ->see('Total Posts')
             ->see('Total Users')
             ->see('Last Login Users')
             ->see('Recent Comments')
             ->see('Latest Posts');

        $this->assertViewHasAll(['posts', 'users', 'comments','countUsers','countPosts','countPages','percentComments']);
    }
}
