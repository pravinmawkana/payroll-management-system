<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyTanMaster;
use DataTables;
use Illuminate\Support\Facades\validator;
class CompanytanMasterController extends Controller
{
    public function index(Request $request){

        return view('companytandetails');

    }
    // handler insert using ajax
    public function store(Request $request){

        //print_r($_POST);
        $companytanmaster = [
        'tanNo' =>$request->tanNo,
        'tanRegisterAt' =>$request->tanRegisterAt,
        'tdsCircle' =>$request->tdsCircle,
        'decuctorType' =>$request->decuctorType,
        'address1' =>$request->address1,
        'address2' =>$request->address2,
        'address3' =>$request->address3,
        'city' =>$request->city,
        'pinCode' =>$request->pinCode,
        'state' =>$request->state,
        'emailId1' =>$request->emailId1,
        'emailId2' =>$request->emailId2,
        'contact1' =>$request->contact1,
        'contact2' =>$request->contact2,
        'resonsiblePersonName' =>$request->resonsiblePersonName,
        'resonsiblePersonPAN' =>$request->resonsiblePersonPAN,
        'resonsiblePersonDesignation' =>$request->resonsiblePersonDesignation,
        'resonsiblePersonFName' =>$request->resonsiblePersonFName,
        'resonsiblePersonMobile' =>$request->resonsiblePersonMobile,
        'resonsiblePersonContactNo1' =>$request->resonsiblePersonContactNo1,
        'resonsiblePersonContactNo2' =>$request->resonsiblePersonContactNo2,
        'resonsiblePersonemailId1' =>$request->resonsiblePersonemailId1,
        'resonsiblePersonemailId2' =>$request->resonsiblePersonemailId2,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1


        ];

          $validator =  Validator::make($request->all(),[
            'tanNo' =>'required | max:10',
            'tanRegisterAt' =>'required | max:50',
            'tdsCircle' =>'required | max:50',
            'decuctorType' =>'required | max:50',
            'address1' =>'required | max:50',
            'address2' =>'required | max:50',
            'address3' =>'required | max:50',
            'city' =>'required | max:50',
            'pinCode' =>'required | min:6 | max:10',
            'state' =>'required | max:50',
            'emailId1' =>'required | max:255 | email',
            'emailId2' =>'required | max:255 | email',
            'contact1' =>'required | max:50',
            'contact2' =>'required | max:50',
            'resonsiblePersonName' =>'required | max:100',
            'resonsiblePersonPAN' =>'required | max:50',
            'resonsiblePersonDesignation' =>'required | max:50',
            'resonsiblePersonFName' =>'required | max:100',
            'resonsiblePersonMobile' =>'required | max:50',
            'resonsiblePersonContactNo1' =>'required | max:50',
            'resonsiblePersonContactNo2' =>'required | max:50',
            'resonsiblePersonemailId1' =>'required | max:255 | email',
            'resonsiblePersonemailId2' =>'required | max:255 |email'

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }
        //print_r($companytanmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage = CompanyTanMaster::create($companytanmaster);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request){
        $companytanmaster = CompanyTanMaster::all()->where('status','=',1)->where('companyId','=',$request->session()->get('companyId'));
        //print_r($companytanmaster);
        $response = "";
        if($companytanmaster->count()>0){
            $response.='<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Tan Id</th>
                                <th>TAN No</th>
                                <th>Resonsible Person Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
                        foreach ($companytanmaster as $row) {
                                $response.= '
                                            <tr>
                                            <td>'.$row['tanId'].'</td>
                                            <td>'.$row['tanNo'].'</td>'.'<td>'.$row['resonsiblePersonName'].'</td>' .
                                            '<td><input type="button" value="edit" onclick='."editData('1','Edit',".$row['tanId'].")" .' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick='."editData('0','Edit',".$row['tanId'].")" .' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick='."deleteData('1','Delete',".$row['tanId'].")" .' class="btn btn-danger"> </td>
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
            //echo $request->tanId;
             $companytanmaster = CompanyTanMaster::find($request->tanId);
            //return $companytanmaster->count();

             return response()->json($companytanmaster);


    }
    public function update(Request $request){
        $validator =  Validator::make($request->all(),[
            'tanNo' =>'required | max:10',
            'tanRegisterAt' =>'required | max:50',
            'tdsCircle' =>'required | max:50',
            'decuctorType' =>'required | max:50',
            'address1' =>'required | max:50',
            'address2' =>'required | max:50',
            'address3' =>'required | max:50',
            'city' =>'required | max:50',
            'pinCode' =>'required | min:6 | max:10',
            'state' =>'required | max:50',
            'emailId1' =>'required | max:255 | email',
            'emailId2' =>'required | max:255 | email',
            'contact1' =>'required | max:50',
            'contact2' =>'required | max:50',
            'resonsiblePersonName' =>'required | max:100',
            'resonsiblePersonPAN' =>'required | max:50',
            'resonsiblePersonDesignation' =>'required | max:50',
            'resonsiblePersonFName' =>'required | max:100',
            'resonsiblePersonMobile' =>'required | max:50',
            'resonsiblePersonContactNo1' =>'required | max:50',
            'resonsiblePersonContactNo2' =>'required | max:50',
            'resonsiblePersonemailId1' =>'required | max:255 | email',
            'resonsiblePersonemailId2' =>'required | max:255 |email'


        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $companytanmaster = CompanyTanMaster::find($request->rowId);

        //print_r($_POST);
        $companytanmasterData = [
        'tanNo' =>$request->tanNo,
        'tanRegisterAt' =>$request->tanRegisterAt,
        'tdsCircle' =>$request->tdsCircle,
        'decuctorType' =>$request->decuctorType,
        'address1' =>$request->address1,
        'address2' =>$request->address2,
        'address3' =>$request->address3,
        'city' =>$request->city,
        'pinCode' =>$request->pinCode,
        'state' =>$request->state,
        'emailId1' =>$request->emailId1,
        'emailId2' =>$request->emailId2,
        'contact1' =>$request->contact1,
        'contact2' =>$request->contact2,
        'resonsiblePersonName' =>$request->resonsiblePersonName,
        'resonsiblePersonPAN' =>$request->resonsiblePersonPAN,
        'resonsiblePersonDesignation' =>$request->resonsiblePersonDesignation,
        'resonsiblePersonFName' =>$request->resonsiblePersonFName,
        'resonsiblePersonMobile' =>$request->resonsiblePersonMobile,
        'resonsiblePersonContactNo1' =>$request->resonsiblePersonContactNo1,
        'resonsiblePersonContactNo2' =>$request->resonsiblePersonContactNo2,
        'resonsiblePersonemailId1' =>$request->resonsiblePersonemailId1,
        'resonsiblePersonemailId2' =>$request->resonsiblePersonemailId2,
        'companyId'=>$request->session()->get('companyId'),
        'status'=>1


        ];
        //print_r($companytanmaster);

        date_default_timezone_set('Asia/Kolkata');
        $companytanmaster->update($companytanmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Updated'
        ]);
    }
    public function delete(Request $request){
        $companytanmaster = CompanyTanMaster::find($request->tanId);
        $companytanmasterData = [
            'status'=>0
        ];
        //print_r($companytanmaster);

        date_default_timezone_set('Asia/Kolkata');
        $companytanmaster->update($companytanmasterData);
        return response()->json([
            'status'=> 200,
            'rowmessage'=> '1 Record Deleted'
        ]);

    }
}
