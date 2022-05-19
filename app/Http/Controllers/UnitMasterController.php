<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class UnitMasterController extends Controller
{
    public function index(Request $request){

        return view('unitmaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $unitmaster = [
        'unitName' =>$request->unitName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'unitName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($unitmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = UnitMaster::create($unitmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $unitmaster = UnitMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($unitmaster);
        $response = "";
        if($unitmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Unit Id</th>
                                <th>Unit Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($unitmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['unitId'].'</td>
                                            <td>'.$row['unitName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['unitId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['unitId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['unitId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->unitId;
             $unitmaster = UnitMaster::find($request->unitId);
            //return $unitmaster->count();

             return response()->json($unitmaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'unitName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $unitmaster = UnitMaster::find($request->rowId);

        //print_r($_POST);
        $unitmasterData = [
        'unitName' =>$request->unitName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($unitmaster);

        date_default_timezone_set('Asia/Kolkata');
        $unitmaster->update($unitmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $unitmaster = UnitMaster::find($request->unitId);
        $unitmasterData = [
            'status'=>0
        ];
        //print_r($unitmaster);

        date_default_timezone_set('Asia/Kolkata');
        $unitmaster->update($unitmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
