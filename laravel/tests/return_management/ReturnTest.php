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
        $user = \App\User::find(1);
        $this->be($user);
        $this->call('GET', '/return/newitem');
        $this->assertResponseOk();
        //$this->assertViewHas('search-input');
        $this->call('GET', '/return/manageitem');
        $this->assertResponseOk();
        $this->call('GET', '/return/dashboard');
        $this->assertResponseOk();

    }
    public function testGetReturnData(){
        $user =  \App\User::find(1);
        $this->be($user);
        $response = $this->action('GET', 'ReturnController@getAReturnInfo',['id'=> 30]);
        $view = $response->original;
        $customer =$view['customer'];
        $this->assertEquals('thulana', $customer['customerName']);

    }
    public function testWCN(){
        $user =  \App\User::find(1);
        $this->be($user);
        $response = $this->action('GET', 'ReturnController@getWCN',['id'=> 30]);
        $view = $response->original;
        $data =$view['data'];
        $this->assertEquals(30, $data['id']);
    }



}