<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class CategoryMasterController extends Controller
{
    public function index(Request $request){

        return view('categorymaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
       $categorymaster = [
        'catgName' =>$request->catgName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

          $validator =  Validator::make($request->all(),[
            'catgName' =>'required | max:50'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($categorymaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = CategoryMaster::create($categorymaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
       $categorymaster = CategoryMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($categorymaster);
        $response = "";
        if($categorymaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Category Id</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($categorymaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['catgId'].'</td>
                                            <td>'.$row['catgName'].'</td>'.
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['catgId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['catgId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['catgId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->catgId;
            $categorymaster = CategoryMaster::find($request->catgId);
            //return$categorymaster->count();

             return response()->json($categorymaster);


    }
    public function update(Request $request){

          $validator =  Validator::make($request->all(),[
                'catgName' =>'required | max:50'
                ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


       $categorymaster = CategoryMaster::find($request->rowId);

        //print_r($_POST);
       $categorymasterData = [
        'catgName' =>$request->catgName,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1
        ];

        //print_r($categorymaster);

        date_default_timezone_set('Asia/Kolkata');
       $categorymaster->update($categorymasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
       $categorymaster = CategoryMaster::find($request->catgId);
       $categorymasterData = [
            'status'=>0
        ];
        //print_r($categorymaster);

        date_default_timezone_set('Asia/Kolkata');
       $categorymaster->update($categorymasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
