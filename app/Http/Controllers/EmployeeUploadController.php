<?php

namespace App\Http\Controllers;

use App\Imports\EmployeesImport;
use App\Models\Employeemaster;
use App\Models\Exceldata;
use Illuminate\Support\Facades\validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeUploadController extends Controller
{
    public function index()
    {
        return view('uploademployee');
    }
    public function importEmployee(Request $request)
    {
        // return response($request->all());
        $rules = [
            'employeUpload' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response = array("status" => 400, "msg" => $validator->errors()->first(), "result" => array());
        } else {
            $data = Excel::toArray(new EmployeesImport(), $request->file('employeUpload'));
            $dataCount = count($data[0]);
            if ($dataCount > 0) {
                $csv_data = array_slice($data[0], 0, 5);
                $csv_data_file = Exceldata::create([
                    'empId' => 1,
                    'excel_filename' => $request->file('employeUpload')->getClientOriginalName(),
                    'excel_data' => json_encode($data)
                ]);
            }
            $response = array("status" => 200, "msg" => "success", "data" => view('excel_import.exceldataget', compact('csv_data_file', 'dataCount', 'csv_data'))->render());
        }

        return response($response, 200);
    }
    public function importProcess(Request $request)
    {
        // return response($request->fields);
        $data = Exceldata::find($request->csv_data_file_id);
        $csv_data = json_decode($data->excel_data, true);
        if (!empty($csv_data)) {
            foreach ($csv_data[0] as $key => $row) {
                $employee = new Employeemaster();
                // return $row;
                // $employee = array();

                foreach (config('app.db_fields') as $field) {
                    // return $request->fields;
                    $employee->$field = $row[$request->fields[$field]];
                }
                $employee->save();
                $arr = array('status', 200, 'msg' => 'Records added successfully', 'data' => $employee, 'request');
            }
        } else {
            $arr = array('status', 400, 'msg' => 'Data not found', 'data' => array());
        }
        return response($arr, 200);


        return response($data, 200);
    }
}
