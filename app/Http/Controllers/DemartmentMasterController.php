<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class DemartmentMasterController extends Controller
{
    public function index(Request $request){

        return view('departhmentMaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $deparmentmaster = [
        'deptName' =>$request->deptName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'deptName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($deparmentmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = DepartmentMaster::create($deparmentmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $deparmentmaster = DepartmentMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($deparmentmaster);
        $response = "";
        if($deparmentmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Department Id</th>
                                <th>Department Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($deparmentmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['deptId'].'</td>
                                            <td>'.$row['deptName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['deptId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['deptId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['deptId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->deptId;
             $deparmentmaster = DepartmentMaster::find($request->deptId);
            //return $deparmentmaster->count();

             return response()->json($deparmentmaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'deptName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $deparmentmaster = DepartmentMaster::find($request->rowId);

        //print_r($_POST);
        $deparmentmasterData = [
        'deptName' =>$request->deptName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($deparmentmaster);

        date_default_timezone_set('Asia/Kolkata');
        $deparmentmaster->update($deparmentmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $deparmentmaster = DepartmentMaster::find($request->deptId);
        $deparmentmasterData = [
            'status'=>0
        ];
        //print_r($deparmentmaster);

        date_default_timezone_set('Asia/Kolkata');
        $deparmentmaster->update($deparmentmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
