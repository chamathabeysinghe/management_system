<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{


    public function test_project(){
       $feedback=$this->createTestData();
       $this->assertEquals(1,$feedback->project_id);
    }

    private function createTestData()
    {

        $project =new \App\Project();
        $project->client_name='chamath';
        $project->id=1;
        $feedback=new \App\Feedback();
        $project->feedback=$feedback;
        return $project;
    }
}
