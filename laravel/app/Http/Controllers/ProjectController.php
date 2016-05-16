<?php
/**
 * Created by PhpStorm.
 * User: Chamath Abeysinghe
 * Date: 4/20/2016
 * Time: 3:13 PM
 */

namespace App\Http\Controllers;


use App\Bill;
use App\Estimation;
use App\Item;
use App\Project;
use App\SellingItem;
use App\Technician;
use App\TechnicianAllocation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    public function createProjectFromEstimation(Request $request){
        $project=new Project();
        echo $request['estimation_number'];

        $project->estimation_id=$request['estimation_number'];

        $project->save();
    }

    public function getProjectInitiatePage($project_id){

        if(!$this->checkEligibility(2)){
            return redirect()->back();
        }
        //validate the project
        $project=Project::where('id',$project_id)->first();
        $technicians=Technician::get();
        $selling_items=SellingItem::get();
        $estimation_id=$project->estimation_id;
        $estimation=Estimation::where('id',$estimation_id)->first();
        $estimation_records=null;
        if($estimation!=null){
            $estimation_records=unserialize($estimation->estimation_record_list);
        }

        //$estimation=$project->estimation;
        return view('/project_management/project_init',['project'=>$project,'technicians'=>$technicians,'sellingitems'=>$selling_items,'estimation_records'=>$estimation_records]);
    }

    public function checkEligibility($status){
        $user_type=Auth::user()->user_type;
        if($status==1){
            if($user_type==1 or $user_type==2 or $user_type==3 ){
                return true;
            }
        }
        if($status==2){
            if($user_type==1){
                return true;
            }
        }
        return false;
    }

    public function getDashboard(){
        $projects=Project::orderBy('project_status','asc')->get();
        return view('project_management\project_dashboard',['projects'=>$projects]);
    }


    public function getProjectInfo($project_id){

        $project=Project::where('id',$project_id)->first();
        $feedback=$project->feedback;


        $technicianAllocations=TechnicianAllocation::where('project_id',$project_id)->get();
        $technicianList=array();
        foreach($technicianAllocations as $allocation){
            array_push($technicianList,[Technician::where('id',$allocation->technician_id)->first(),($allocation->commission==0)?'':$allocation->commission]);
        }
        $items=Item::where('sale_type',1)->get();
        //echo sizeof($items);
        $itemList=array();
        foreach($items as $item){
            if($item->owner_id==$project_id){
                array_push($itemList,$item);
            }
        }

        $billList=Bill::where('project_id',$project_id)->get();
        $selling_items=SellingItem::get();
        return view('/project_management/projectinfo',['project'=>$project,'technicians'=>$technicianList,'itemList'=>$itemList,'billList'=>$billList,'sellingitems'=>$selling_items,'feedback'=>$feedback]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * handle a project initiate request
     */
    public function postInitiateProject(Request $request){
        $project=Project::where('id',$request['project_id'])->first();
        $project->client_name=$request['client'];
        $project->date=$request['date'];
        $project->client_email=$request['email'];
        $project->description=$request['description'];
        $project->title=$request['title'];
        $project->location=$request['location'];
        $project->incharge=$request['incharge'];
        $project->duration=$request['duration'];
        $project->project_status=1;
        $project->update();
        if($request['selection']){
            foreach($request['selection'] as $selected){
                $allocation=new TechnicianAllocation();
                $allocation->project_id=$request['project_id'];
                $allocation->technician_id=$selected;
                $allocation->save();
            }
        }
        return redirect()->route('project');
    }






    public function postProjectSearch(Request $request){

        $keyword=$request['keyWords'];
        $filter=$request['filter'];
        $projects=Project::all();
        $resultProjects=new Collection();
        foreach($projects as $project){

            if( (strpos($filter, 'id') !== false) and Str::equals(Str::lower($project->id),Str::lower($keyword))){
               $resultProjects->add($project);
            }
        }
        foreach($projects as $project){
            if($resultProjects->contains($project)){
                continue;
            }
            if((strpos($filter, 'client') !== false) and Str::contains(Str::lower($project->client_name),Str::lower($keyword))){
                $resultProjects->add($project);
            }
            if((strpos($filter, 'title') !== false) and Str::contains(Str::lower($project->title),Str::lower($keyword))){
                $resultProjects->add($project);
            }
            else if((strpos($filter, 'date') !== false) and Str::contains(Str::lower($project->date),Str::lower($keyword))){
                $resultProjects->add($project);
            }
        }
        return View::make('/project_management/search_results')->with('resultProjects',$resultProjects);
    }

    public function postItemAllocation(Request $request){

        $project_id=$request['project_id'];
        $project=Project::where('id',$project_id)->first();

        $jfo = json_decode($request['new_data']);
        foreach($jfo as $newData){

            $item=new Item();
            $item->item_name=$newData->item;
            $item->unit_cost=$newData->unitcost;
            $item->serial_number=$newData->serialnumber;
            $item->sale_type=1;
            $item->owner_id=$project_id;
            $item->save();
        }
    }

    public function postRemoveAllocation(Request $request){
        $project_id=$request['project_id'];
        $technician_id=$request['technician_id'];
        $allocation=TechnicianAllocation::where(['project_id'=>$project_id,'technician_id'=>$technician_id])->first();
        if($allocation!=null){
            $allocation->delete();
        }
    }

    public function postCompleteProject(Request $request){
        $project=Project::where('id',$request['project_id'])->first();
        $project->project_status=2;
        $project->update();
    }

}