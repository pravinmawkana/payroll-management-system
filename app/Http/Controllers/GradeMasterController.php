<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GradeMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class GradeMasterController extends Controller
{
    public function index(Request $request){

        return view('grademaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $grademaster = [
        'gradeName' =>$request->gradeName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'gradeName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($grademaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = GradeMaster::create($grademaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $grademaster = GradeMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($grademaster);
        $response = "";
        if($grademaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Grade Id</th>
                                <th>Grade Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($grademaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['gradeId'].'</td>
                                            <td>'.$row['gradeName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['gradeId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['gradeId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['gradeId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->gradeId;
             $grademaster = GradeMaster::find($request->gradeId);
            //return $grademaster->count();

             return response()->json($grademaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'gradeName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $grademaster = GradeMaster::find($request->rowId);

        //print_r($_POST);
        $grademasterData = [
        'gradeName' =>$request->gradeName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($grademaster);

        date_default_timezone_set('Asia/Kolkata');
        $grademaster->update($grademasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $grademaster = GradeMaster::find($request->gradeId);
        $grademasterData = [
            'status'=>0
        ];
        //print_r($grademaster);

        date_default_timezone_set('Asia/Kolkata');
        $grademaster->update($grademasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
