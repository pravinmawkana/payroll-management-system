<?php

namespace App\Http\Controllers;
use App\Models\TDSHeadMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
use Illuminate\Http\Request;

class TDSHeadMasterController extends Controller
{
    public function index(Request $request){

        return view('tdsheadmaster');

    }

    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $tdsheadmaster = [
        'tdsHeadName' =>$request->tdsHeadName,
        'tdsHeadDesc'=>$request->tdsHeadDesc,
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'tdsHeadName' =>'required | max:50',
            'tdsHeadDesc' =>'required | max:255'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($tdsheadmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = TDSHeadMaster::create($tdsheadmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $tdsheadmaster = TDSHeadMaster::all()->where('status','=',1);
        //print_r($tdsheadmaster);
        $response = "";
        if($tdsheadmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>TDS Head Id</th>
                                <th>TDS Head Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($tdsheadmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['tdsHeadId'].'</td>
                                            <td>'.$row['tdsHeadName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['tdsHeadId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['tdsHeadId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['tdsHeadId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->tdsHeadId;
             $tdsheadmaster = TDSHeadMaster::find($request->tdsHeadId);
            //return $tdsheadmaster->count();

             return response()->json($tdsheadmaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'tdsHeadName' =>'required | max:50',
                'tdsHeadDesc' =>'required | max:255'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $tdsheadmaster = TDSHeadMaster::find($request->rowId);

        //print_r($_POST);
        $tdsheadmasterData = [
        'tdsHeadName' =>$request->tdsHeadName,
        'tdsHeadDesc'=>$request->tdsHeadDesc,
        'status'=>1
        ];

        //print_r($tdsheadmaster);

        date_default_timezone_set('Asia/Kolkata');
        $tdsheadmaster->update($tdsheadmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $tdsheadmaster = TDSHeadMaster::find($request->tdsHeadId);
        $tdsheadmasterData = [
            'status'=>0
        ];
        //print_r($tdsheadmaster);

        date_default_timezone_set('Asia/Kolkata');
        $tdsheadmaster->update($tdsheadmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
