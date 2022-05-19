<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyBankMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class CompanyBankMasterController extends Controller
{
    public function index(Request $request){
        // $companybankmaster = CompanyBankMaster::get();

        // if($request->ajax()){
        //     $alldata = DataTables::of($companybankmaster)
        //     ->addIndexColumn()
        //     ->addColumn('action',function($row){
        //         $btn = '<td><input type="button" value="Edit" onclick='."editData('1','Edit',".$row->companyId.")" .' class="btn btn-warning"></td>';
        //         $btn .= '<td><input type="button" value="View" onclick='."editData('0','Edit',".$row->companyId.")" .' class="btn"></td>';
        //         return $btn;
        //     })
        //     ->rawColumns (['action'])
        //     ->make(true);
        //     return $alldata;
        // }

        // return view('companybankmaster',compact('companybankmaster'));
        return view('companybankmaster');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $companybankmaster = [
            'bankName' =>$request->bankName,
            'accountNumber'=>$request->accountNumber,
            'bsrCode'=>$request->bsrCode,
            'micrCode'=>$request->micrCode,
            'ifscCode'=>$request->ifscCode,
            'address'=>$request->address,
            'contactPersonName'=>$request->contactPersonName,
            'contactPersonNo'=>$request->contactPersonNo,
            'companyId'=>$request->session()->get('companyId'),
            'status'=>1

        ];
        //print_r($companybankmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = CompanyBankMaster::create($companybankmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $companybankmaster = CompanyBankMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($companybankmaster);
        $response = "";
        if($companybankmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Bank Id</th>
                                <th>Bank Name</th>
                                <th>Account No</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($companybankmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['bankId'].'</td>
                                            <td>'.$row['bankName'].'</td>'.'<td>'.$row['accountNumber'].'</td>' .
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['bankId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['bankId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['bankId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->bankId;
             $companybankmaster = CompanyBankMaster::find($request->bankId);
            //return $companybankmaster->count();

             return response()->json($companybankmaster);


    }
    public function update(Request $request){
        $validator =  Validator::make($request->all(),[
            'bankName' => 'required | max:50',
            'accountNumber' => 'required |max:50',
            'bsrCode' => 'required |max:20',
            'micrCode'=> 'required |max:20',
            'ifscCode'=> 'required |max:20',
            'address'=> 'required |max:255',
            'contactPersonName'=> 'required |max:50',
            'contactPersonNo'=> 'required |max:20'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $companybankmaster = CompanyBankMaster::find($request->rowId);

        //print_r($_POST);
        $companybankmasterData = [
            'bankName' =>$request->bankName,
            'accountNumber'=>$request->accountNumber,
            'bsrCode'=>$request->bsrCode,
            'micrCode'=>$request->micrCode,
            'ifscCode'=>$request->ifscCode,
            'address'=>$request->address,
            'contactPersonName'=>$request->contactPersonName,
            'contactPersonNo'=>$request->contactPersonNo,
            'companyId'=>$request->session()->get('companyId'),
            'status'=>1

        ];
        //print_r($companybankmaster);

        date_default_timezone_set('Asia/Kolkata');
        $companybankmaster->update($companybankmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $companybankmaster = CompanyBankMaster::find($request->bankId);
        $companybankmasterData = [
            'status'=>0
        ];
        //print_r($companybankmaster);

        date_default_timezone_set('Asia/Kolkata');
        $companybankmaster->update($companybankmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }

}
