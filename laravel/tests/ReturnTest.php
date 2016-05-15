<?php

/**
 * Created by PhpStorm.
 * User: TK
 * Date: 15/05/2016
 * Time: 07:03 PM
 */
class ReturnTest extends TestCase
{
    public function testGetRoutes(){
        $this->call('GET', '/return/newitem');
        $this->assertResponseOk();
        //$this->assertViewHas('search-input');
        $this->call('GET', '/return/manageitem');
        $this->assertResponseOk();
        $this->call('GET', '/return/dashboard');
        $this->assertResponseOk();

    }
    public function testControllerRoutes(){
        $response = $this->action('GET', 'ReturnController@getAReturnInfo',['id'=> 30]);
        $view = $response->original;
        $customer =$view['customer'];
        $this->assertEquals('thulana', $customer['customerName']);

    }
}