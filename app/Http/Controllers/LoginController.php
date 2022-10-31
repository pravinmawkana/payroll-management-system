<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblemployeedetailsModel;
use Illuminate\Support\Facades\validator;
class LoginController extends Controller
{
    public function index(Request $request ){
        //session()->flush();
        //$request->session()->forget('userName');
        return view('login');

    }
    public function logout(Request $request){
        $request->session()->forget('userName');
        return view('login');
    }
    public function login(Request $request){
        $validator =  Validator::make($request->all(),[
            'userName' => 'required',
            'userPassword' => 'required ',
            'userPassword1' => 'required | same:userPassword' //same:password for remove confirmed

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=> $validator->messages(),
            ]);
        }


        $pass = \md5( $request->userPassword);
        $user = TblemployeedetailsModel::where('userName', '=', $request->userName)
        ->where('userPassword', '=',$pass)
        ->get();
        // \md5($request->userPassword);

        //echo "<pre>";

        if($user->isEmpty())
        {
            exit("Incorrect username/password");
        }
        else
        {

            $request->session()->put('userid', $user[0]->empId);
            $request->session()->put('userName', $user[0]->empFirstName . " " .$user[0]->empLastName);
            $request->session()->put('userRights', $user[0]->userRights);
            $request->session()->put('lastLogOn', $user[0]->lastLogOn);
            $request->session()->put('ristriction', $user[0]->ristriction);
            $request->session()->put('ristrictSunday', $user[0]->ristrictSunday);
            $request->session()->put('startTime', $user[0]->startTime);
            $request->session()->put('endTime', $user[0]->endTime);
            $request->session()->put('password2', "pravin");
            $request->session()->put('userid', $user[0]->empId);
            $request->session()->put('companyId',1);

            echo $request->session()->get('userRights');
        }

        // print_r($user->all());
         //echo "user id " . $user[0]->userRights;
         //$userData = json_encode($user);
         //print_r($user);

        //die;
        //$user = \compact($user);

        //echo "test";

    }
}
