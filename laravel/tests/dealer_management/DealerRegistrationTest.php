<?php
/**
 * Created by PhpStorm.
 * User: com
 * Date: 10-May-16
 * Time: 7:20 PM
 */

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    // use WithoutMiddleware;
    public function testStockView(){
        $user = User::find(1);
        $this->be($user);
        $response = $this->call('GET','/dealer/stock');
        $this->assertEquals(200, $response->status());
    }

    public function testRegistrationView(){
        $user = User::find(1);
        $this->be($user);
        $response=$this->call('GET','/dealer/register');
        $this->assertEquals(200,$response->status());
    }

    public function testSearchView(){
        $user = User::find(1);
        $this->be($user);
        $response=$this->call('GET','/dealer/view');
        $this->assertEquals(200,$response->status());
    }



}