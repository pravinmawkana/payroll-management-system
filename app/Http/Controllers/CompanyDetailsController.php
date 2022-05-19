<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetails;
use Illuminate\Http\Request;
use DataTables;
class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {

        $companyDetails = CompanyDetails::get();

        if($request->ajax()){
            $alldata = DataTables::of($companyDetails)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn = '<td><input type="button" value="Edit" onclick='."editData('1','Edit',".$row->companyId.")" .' class="btn btn-warning"></td>';
                $btn .= '<td><input type="button" value="View" onclick='."editData('0','Edit',".$row->companyId.")" .' class="btn"></td>';
                return $btn;
            })
            ->rawColumns (['action'])
            ->make(true);
            return $alldata;
        }

        return view('companydetails',compact('companyDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDetails $companyDetails)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

             $companyDetails = CompanyDetails::find($request->id);
             return response()->json($companyDetails);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyDetails $companyDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDetails $companyDetails)
    {
        //
    }
}
