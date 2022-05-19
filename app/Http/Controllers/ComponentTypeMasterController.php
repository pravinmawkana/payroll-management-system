<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComponentTypeMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class ComponentTypeMasterController extends Controller
{
    public function index(Request $request){

        return view('ctypemaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $componenttypemaster = [
        'cTypeName' =>$request->cTypeName,
        'cTypeDesc'=>$request->cTypeDesc,
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'cTypeName' =>'required | max:50',
            'cTypeDesc' =>'required | max:255'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($componenttypemaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = ComponentTypeMaster::create($componenttypemaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $componenttypemaster = ComponentTypeMaster::all()->where('status','=',1);
        //print_r($componenttypemaster);
        $response = "";
        if($componenttypemaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Component Type Id</th>
                                <th>Component Type Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($componenttypemaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['cTypeId'].'</td>
                                            <td>'.$row['cTypeName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['cTypeId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['cTypeId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['cTypeId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->cTypeId;
             $componenttypemaster = ComponentTypeMaster::find($request->cTypeId);
            //return $componenttypemaster->count();

             return response()->json($componenttypemaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'cTypeName' =>'required | max:50',
                'cTypeDesc' =>'required | max:255'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $componenttypemaster = ComponentTypeMaster::find($request->rowId);

        //print_r($_POST);
        $componenttypemasterData = [
        'cTypeName' =>$request->cTypeName,
        'cTypeDesc'=>$request->cTypeDesc,
        'status'=>1
        ];

        //print_r($componenttypemaster);

        date_default_timezone_set('Asia/Kolkata');
        $componenttypemaster->update($componenttypemasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $componenttypemaster = ComponentTypeMaster::find($request->cTypeId);
        $componenttypemasterData = [
            'status'=>0
        ];
        //print_r($componenttypemaster);

        date_default_timezone_set('Asia/Kolkata');
        $componenttypemaster->update($componenttypemasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
