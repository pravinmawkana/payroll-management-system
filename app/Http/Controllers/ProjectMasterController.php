<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class ProjectMasterController extends Controller
{
    public function index(Request $request){

        return view('projectmaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $projectmaster = [
        'projectName' =>$request->projectName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'projectName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($projectmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = ProjectMaster::create($projectmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $projectmaster = ProjectMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($projectmaster);
        $response = "";
        if($projectmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Project Id</th>
                                <th>Project Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($projectmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['projectId'].'</td>
                                            <td>'.$row['projectName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['projectId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['projectId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['projectId'].")" .' class="btn btn-danger"> </td>
                                            </tr>';
                        }
        }else{
            $response.='<h1 class="text-center"> No Records</h1>';
        }
        $response.= '    </tbody>
                    </table>';
        return $response;
    }
    public function edit(Request $request){
            //echo $request->projectId;
             $projectmaster = ProjectMaster::find($request->projectId);
            //return $projectmaster->count();

             return response()->json($projectmaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'projectName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $projectmaster = ProjectMaster::find($request->rowId);

        //print_r($_POST);
        $projectmasterData = [
        'projectName' =>$request->projectName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($projectmaster);

        date_default_timezone_set('Asia/Kolkata');
        $projectmaster->update($projectmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $projectmaster = ProjectMaster::find($request->projectId);
        $projectmasterData = [
            'status'=>0
        ];
        //print_r($projectmaster);

        date_default_timezone_set('Asia/Kolkata');
        $projectmaster->update($projectmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
