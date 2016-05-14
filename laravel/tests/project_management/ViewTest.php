<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogInView()
    {
        $response=$this->call('GET','/');
        $this->assertTrue(strpos($response->getContent(),'Log In')!=false);
    }

    public function testFeedback(){
        $response=$this->call('GET','/feedback');
        $this->assertTrue(strpos($response->getContent(),'Client feedback form')!=false);
    }




}
