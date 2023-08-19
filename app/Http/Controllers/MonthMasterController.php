<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use App\Models\MonthMaster;

class MonthMasterController extends Controller
{
    public function index(Request $request)
    {

        return view('selectmonth');
    }
    // handler insert using ajax
    public function store(Request $request)
    {

        //print_r($_POST);
        $companybankmaster = [
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'mDays' => $request->mDays,
            'month' => $request->month,
            'year' => $request->year,
            'monthDesc' =>    $request->month . '-' . $request->year,
            'companyId' => $request->session()->get('companyId'),
            'status' => 1

        ];
        //print_r($companybankmaster);
        date_default_timezone_set('Asia/Kolkata');
        $rowmessage =  MonthMaster::create($companybankmaster);
        return response()->json([
            'status' => 200,
            'rowmessage' => '1 Record Inserted'
        ]);
    }
    public function displayRecords(Request $request)
    {
        $companybankmaster = MonthMaster::all()->where('status', '=', 1)->where('companyId', '=', $request->session()->get('companyId'));
        //print_r($companybankmaster);
        $response = "";
        if ($companybankmaster->count() > 0) {
            $response .= '<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Month Id</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Days </th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>';
            foreach ($companybankmaster as $row) {
                $response .= '
                                            <tr>
                                            <td>' . $row['sMonthId'] . '</td>
                                            <td>' . $row['startDate'] . '</td>' . '<td>' . $row['endDate'] . '</td>' . '<td>' . $row['mDays'] . '</td>' .
                    '<td><input type="button" value="edit" onclick=' . "editData('1','Edit'," . $row['sMonthId'] . ")" . ' class="btn btn-warning"></td>
                                            <td><input type="button" value="View" onclick=' . "editData('0','Edit'," . $row['sMonthId'] . ")" . ' class="btn"></td>
                                            <td><input type="button" value="Delete" onclick=' . "deleteData('1','Delete'," . $row['sMonthId'] . ")" . ' class="btn btn-danger"> </td>
                                            </tr>';
            }
        } else {
            $response .= '<h1 class="text-center"> No Records</h1>';
        }
        $response .= '    </tbody>
                    </table>';
        return $response;
    }
    public function edit(Request $request)
    {
        //echo $request->sMonthId;
        $companybankmaster = MonthMaster::find($request->sMonthId);
        //return $companybankmaster->count();

        return response()->json($companybankmaster);
    }
    public function update(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'startDate' => 'required | max:50',
            'endDate' => 'required |max:50',
            'mDays' => 'required |max:20',
            'month' => 'required |max:20',
            'year' => 'required |max:20',


        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }


        $companybankmaster = MonthMaster::find($request->rowId);

        //print_r($_POST);
        $companybankmasterData = [
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'mDays' => $request->mDays,
            'month' => $request->month,
            'year' => $request->year,
            'companyId' => $request->session()->get('companyId'),
            'status' => 1

        ];
        //print_r($companybankmaster);

        date_default_timezone_set('Asia/Kolkata');
        $companybankmaster->update($companybankmasterData);
        return response()->json([
            'status' => 200,
            'rowmessage' => '1 Record Updated'
        ]);
    }
    public function delete(Request $request)
    {
        $companybankmaster = MonthMaster::find($request->sMonthId);
        $companybankmasterData = [
            'status' => 0
        ];
        //print_r($companybankmaster);

        date_default_timezone_set('Asia/Kolkata');
        $companybankmaster->update($companybankmasterData);
        return response()->json([
            'status' => 200,
            'rowmessage' => '1 Record Deleted'
        ]);
    }
}