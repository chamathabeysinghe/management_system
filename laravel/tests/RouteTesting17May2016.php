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
    public function testNewQuotationView(){
        $user = User::find(1);
        $this->be($user);
        $response = $this->call('GET','/newquotation');
        $this->assertEquals(200, $response->status());
    }

    public function testNewSellingItemView(){
        $user = User::find(1);
        $this->be($user);
        $response=$this->call('GET','/newsellingitem');
        $this->assertEquals(200,$response->status());
    }

    public function testQuotationSummaryView(){
        $user = User::find(1);
        $this->be($user);
        $response=$this->call('GET','/getquotationsummary');
        $this->assertEquals(200,$response->status());
    }

    public function testEstimationSummaryView(){
        $user = User::find(1);
        $this->be($user);
        $response=$this->call('GET','/getestimationsummary');
        $this->assertEquals(200,$response->status());
    }

}