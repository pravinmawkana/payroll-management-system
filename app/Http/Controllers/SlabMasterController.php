<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlabMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class SlabMasterController extends Controller
{
    public function index(Request $request){

        return view('slabmaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $slabmaster = [
        'slabName' =>$request->slabName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'slabName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($slabmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = SlabMaster::create($slabmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $slabmaster = SlabMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($slabmaster);
        $response = "";
        if($slabmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Slab Id</th>
                                <th>Slab Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($slabmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['slabId'].'</td>
                                            <td>'.$row['slabName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['slabId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['slabId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['slabId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->slabId;
             $slabmaster = SlabMaster::find($request->slabId);
            //return $slabmaster->count();

             return response()->json($slabmaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'slabName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $slabmaster = SlabMaster::find($request->rowId);

        //print_r($_POST);
        $slabmasterData = [
        'slabName' =>$request->slabName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($slabmaster);

        date_default_timezone_set('Asia/Kolkata');
        $slabmaster->update($slabmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $slabmaster = SlabMaster::find($request->slabId);
        $slabmasterData = [
            'status'=>0
        ];
        //print_r($slabmaster);

        date_default_timezone_set('Asia/Kolkata');
        $slabmaster->update($slabmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
