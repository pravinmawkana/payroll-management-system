@extends('layout.main')
@push('title')
    <title>Component Name Master</title>

@endpush
@section('page-name')
    Component Name Master
@endsection
@section('main-content')

<div class="container-fluid">
    <button id="btnEarning" type="button" class="btn btn-info" data-toggle="collapse" data-target="#earningDetails" disabled >Earning</button>
    <button id="btnDeduction" type="button" class="btn btn-info" data-toggle="collapse" data-target="#deductionDetails"> Deduction</button>
    <button id="btnOther" type="button" class="btn btn-info" data-toggle="collapse" data-target="#otherDetails">Other </button>

<div id="earningDetails" class="collapse show">
{{-- Start Form Earning--}}
<form name="frmEarningComponent" id="frmEarningComponent" method="post"  action="ComponnentNameMaster">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>Component Allocation Earning </h3>
    </div>
    <div class="form-group col-md-6">
      <div class="message"></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-1">
      <div class="Id"></div>
    </div>
    <div class="form-group col-md-3">

      </div>
    </div>


  <div class="form-row">
      <div class="form-group col-md-3">
          <label for="comptName">Component Name</label>
          <select class="selectcomptName" name="comptName" id="comptName">
              <option value="select">---Select---</option>
          </select>
          <input type="hidden" id = "txtComptName" name="txtComptName">
          <input type="hidden" id = "cTypeId" name="cTypeId" value="1">

        </div>
    <div class="form-group col-md-3">
      <label for="calcCode">Component Calculation Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="calcCode" name="calcCode" placeholder="Enter Component Calculation Name" required readonly>
    </div>
     <div class="form-group col-md-3">
      <label for="comptDesc">Component Description</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="comptDesc" name="comptDesc" placeholder="Enter Component Description" required>
    </div>
    <div class="form-group col-md-3">
          <label for="calcType">Component Clac Type</label>
          <select class="selectcalcType" name="calcType" id="calcType">
              <option value="select">---Select---</option>
              <option value="Fixed">Fixed</option>
              <option value="Formula">Formula</option>
              <option value="Variable">Variable</option>
              <option value="Bonus">Bonus</option>
              <option value="Reimbusement">Reimbusement</option>
              <option value="Fixed Reimbusement">Fixed Reimbusement</option>
              <option value="Loan">Loan</option>
              <option value="Gratuty">Gratuty</option>
          </select>
        </div>
  </div>
<div class="form-row">

    <div class="form-group col-md-2">
          <label for="calcAttendance">Calc on Attendance</label>
          <select class="selectcalcAttendance" name="calcAttendance" id="calcAttendance">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="consdWeekOff">Consider Week Off</label>
          <select class="selectconsdWeekOff" name="consdWeekOff" id="consdWeekOff">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="consdPubHoliday">Condider Public Holidays</label>
          <select class="selectconsdPubHoliday" name="consdPubHoliday" id="consdPubHoliday">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
     <div class="form-group col-md-2">
          <label for="roundOff">Round off</label>
          <select class="selectroundOff" name="roundOff" id="roundOff">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="printIfZero">Print in Payslip if zero</label>
          <select class="selectprintIfZero" name="printIfZero" id="printIfZero">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
        <div class="form-group col-md-1">
      <label for="printOrder">Print Order</label>
      <input type="number" size="4" maxlength="4" class="form-control" id="printOrder" name="printOrder" placeholder="Print Order" required>
    </div>
    <div class="form-group col-md-1">
      <label for="calcOrder">Calc Order</label>
      <input type="number" size="4" maxlength="4" class="form-control" id="calcOrder" name="calcOrder" placeholder="Calc Order" required>
    </div>
  </div>
<div class="form-row">
      <div class="form-group col-md-3">
          <label for="tdsHead">TDS Head Name</label>
          <select class="selecttdsHead" name="tdsHead" id="tdsHead">
              <option value="select">---Select---</option>
          </select>

        </div>
    <div class="form-group col-md-3">
      <label for="examptionLimit">Examption Limit</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="examptionLimit" name="examptionLimit" placeholder="Enter Examiption Limit" required>
    </div>
     <div class="form-group col-md-3">
      <label for="comptFormula">Formula Description</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="comptFormula" name="comptFormula" placeholder="Enter Component Formula" required>
    </div>

  </div>
  <div class="form-row">
        <div class="form-group col-md-3">
          <input type="hidden" class="form-control" id="rowId" name="rowId">
        </div>
        <div class="form-group col-md-3">
          <button id="btnSave" name="btnSave" type="submit" class="btn btn-success">Save</button>
        </div>
        <div class="form-group col-md-3">
          <button id="btnCancel" name="btnCancel" type="button" class="btn btn-primary">Reset/Cancel</button>
        </div>
        <div class="form-group col-md-3">

        </div>
      </div>
</form>

{{-- end form Earning --}}

{{-- Data Table Start Earning--}}
<div class="table-responsive-md" id="loadRecordTable">
<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Component Id</th>
                                <th>Component Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody id="earingTbody">

{{-- <h1> Loadding....</h1> --}}
                            </tbody>
</table>
</div>
{{-- Data Table End Earning --}}
</div>
<div id="deductionDetails" class="collapse">
    {{-- Start Form Deduction--}}
    <form name="frmdeductionComponent" id="frmdeductionComponent" method="post"  action="ComponnentNameMaster">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>Component Allocation Deduction </h3>
    </div>
    <div class="form-group col-md-6">
      <div class="messageDeduction"></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-1">
      <div class="Id"></div>
    </div>
    <div class="form-group col-md-3">

      </div>
    </div>


  <div class="form-row">
      <div class="form-group col-md-3">
          <label for="comptNamededuction">Component Name</label>
          <select class="selectcomptNamededuction" name="comptNamededuction" id="comptNamededuction">
              <option value="select">---Select---</option>
          </select>
          <input type="hidden" id = "txtComptNamededuction" name="txtComptNamededuction">
          <input type="hidden" id = "cTypeIddeduction" name="cTypeIddeduction" value="2">

        </div>
    <div class="form-group col-md-3">
      <label for="calcCodededuction">Component Calculation Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="calcCodededuction" name="calcCodededuction" placeholder="Enter Component Calculation Name" required readonly>
    </div>
     <div class="form-group col-md-3">
      <label for="comptDescdeduction">Component Description</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="comptDescdeduction" name="comptDescdeduction" placeholder="Enter Component Description" required>
    </div>
    <div class="form-group col-md-3">
          <label for="calcTypededuction">Component Clac Type</label>
          <select class="selectcalcTypededuction" name="calcTypededuction" id="calcTypededuction">
              <option value="select">---Select---</option>
              <option value="Fixed">Fixed</option>
              <option value="Formula">Formula</option>
              <option value="Variable">Variable</option>
              <option value="Bonus">Bonus</option>
              <option value="Reimbusement">Reimbusement</option>
              <option value="Fixed Reimbusement">Fixed Reimbusement</option>
              <option value="Loan">Loan</option>
              <option value="Gratuty">Gratuty</option>
          </select>
        </div>
  </div>
<div class="form-row">

    <div class="form-group col-md-2">
          <label for="calcAttendancededuction">Calc on Attendance</label>
          <select class="selectcalcAttendancededuction" name="calcAttendancededuction" id="calcAttendancededuction">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="consdWeekOffdeduction">Consider Week Off</label>
          <select class="selectconsdWeekOffdeduction" name="consdWeekOffdeduction" id="consdWeekOffdeduction">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="consdPubHolidaydeduction">Condider Public Holidays</label>
          <select class="selectconsdPubHolidaydeduction" name="consdPubHolidaydeduction" id="consdPubHolidaydeduction">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
     <div class="form-group col-md-2">
          <label for="roundOffdeduction">Round off</label>
          <select class="selectroundOffdeduction" name="roundOffdeduction" id="roundOffdeduction">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="printIfZerodeduction">Print in Payslip if zero</label>
          <select class="selectprintIfZerodeduction" name="printIfZerodeduction" id="printIfZerodeduction">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
        <div class="form-group col-md-1">
      <label for="printOrderdeduction">Print Order</label>
      <input type="number" size="4" maxlength="4" class="form-control" id="printOrderdeduction" name="printOrderdeduction" placeholder="Print Order" required>
    </div>
    <div class="form-group col-md-1">
      <label for="calcOrderdeduction">Calc Order</label>
      <input type="number" size="4" maxlength="4" class="form-control" id="calcOrderdeduction" name="calcOrderdeduction" placeholder="Calc Order" required>
    </div>
  </div>
<div class="form-row">
      <div class="form-group col-md-3">
          <label for="tdsHeaddeduction">TDS Head Name</label>
          <select class="selecttdsHeaddeduction" name="tdsHeaddeduction" id="tdsHeaddeduction">
              <option value="select">---Select---</option>
          </select>

        </div>
    <div class="form-group col-md-3">
      <label for="examptionLimitdeduction">Examption Limit</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="examptionLimitdeduction" name="examptionLimitdeduction" placeholder="Enter Examiption Limit" required>
    </div>
     <div class="form-group col-md-3">
      <label for="comptFormuladeduction">Formula Description</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="comptFormuladeduction" name="comptFormuladeduction" placeholder="Enter Component Formula" required>
    </div>

  </div>
  <div class="form-row">
        <div class="form-group col-md-3">
          <input type="hidden" class="form-control" id="rowIddeduction" name="rowIddeduction">
        </div>
        <div class="form-group col-md-3">
          <button id="btnSavededuction" name="btnSavededuction" type="submit" class="btn btn-success">Save</button>
        </div>
        <div class="form-group col-md-3">
          <button id="btnCanceldeduction" name="btnCanceldeduction" type="button" class="btn btn-primary">Reset/Cancel</button>
        </div>
        <div class="form-group col-md-3">

        </div>
      </div>
</form>

{{-- end form Dedution--}}

{{-- Data Table Start Dedution--}}
<div class="table-responsive-md" id="loadRecordTablededuction">
<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Component Id</th>
                                <th>Component Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody id="deductTbody">

{{-- <h1> Loadding....</h1> --}}
                            </tbody>
</table>
</div>
{{-- Data Table End Dedution --}}
</div>
<div id="otherDetails" class="collapse">
    {{-- Start Form Other--}}
    <form name="frmotherComponent" id="frmotherComponent" method="post"  action="ComponnentNameMaster">
    @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <h3>Component Allocation Other </h3>
    </div>
    <div class="form-group col-md-6">
      <div class="messageOther"></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2"></div>
    <div class="form-group col-md-1">
      <div class="Id"></div>
    </div>
    <div class="form-group col-md-3">

      </div>
    </div>


  <div class="form-row">
      <div class="form-group col-md-3">
          <label for="comptNameother">Component Name</label>
          <select class="selectcomptNameother" name="comptNameother" id="comptNameother">
              <option value="select">---Select---</option>
          </select>
          <input type="hidden" id = "txtComptNameother" name="txtComptNameother">
          <input type="hidden" id = "cTypeIdother" name="cTypeIdother" value="3">

        </div>
    <div class="form-group col-md-3">
      <label for="calcCodeother">Component Calculation Name</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="calcCodeother" name="calcCodeother" placeholder="Enter Component Calculation Name" required readonly>
    </div>
     <div class="form-group col-md-3">
      <label for="comptDescother">Component Description</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="comptDescother" name="comptDescother" placeholder="Enter Component Description" required>
    </div>
    <div class="form-group col-md-3">
          <label for="calcTypeother">Component Clac Type</label>
          <select class="selectcalcTypeother" name="calcTypeother" id="calcTypeother">
              <option value="select">---Select---</option>
              <option value="Fixed">Fixed</option>
              <option value="Formula">Formula</option>
              <option value="Variable">Variable</option>
              <option value="Bonus">Bonus</option>
              <option value="Reimbusement">Reimbusement</option>
              <option value="Fixed Reimbusement">Fixed Reimbusement</option>
              <option value="Loan">Loan</option>
              <option value="Gratuty">Gratuty</option>
          </select>
        </div>
  </div>
<div class="form-row">

    <div class="form-group col-md-2">
          <label for="calcAttendanceother">Calc on Attendance</label>
          <select class="selectcalcAttendanceother" name="calcAttendanceother" id="calcAttendanceother">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="consdWeekOffother">Consider Week Off</label>
          <select class="selectconsdWeekOffother" name="consdWeekOffother" id="consdWeekOffother">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="consdPubHolidayother">Condider Public Holidays</label>
          <select class="selectconsdPubHolidayother" name="consdPubHolidayother" id="consdPubHolidayother">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
     <div class="form-group col-md-2">
          <label for="roundOffother">Round off</label>
          <select class="selectroundOffother" name="roundOffother" id="roundOffother">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
    <div class="form-group col-md-2">
          <label for="printIfZeroother">Print in Payslip if zero</label>
          <select class="selectprintIfZeroother" name="printIfZeroother" id="printIfZeroother">
              <option value="select">---Select---</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
          </select>
        </div>
        <div class="form-group col-md-1">
      <label for="printOrderother">Print Order</label>
      <input type="number" size="4" maxlength="4" class="form-control" id="printOrderother" name="printOrderother" placeholder="Print Order" required>
    </div>
    <div class="form-group col-md-1">
      <label for="calcOrderother">Calc Order</label>
      <input type="number" size="4" maxlength="4" class="form-control" id="calcOrderother" name="calcOrderother" placeholder="Calc Order" required>
    </div>
  </div>
<div class="form-row">
      <div class="form-group col-md-3">
          <label for="tdsHeadother">TDS Head Name</label>
          <select class="selecttdsHeadother" name="tdsHeadother" id="tdsHeadother">
              <option value="select">---Select---</option>
          </select>

        </div>
    <div class="form-group col-md-3">
      <label for="examptionLimitother">Examption Limit</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="examptionLimitother" name="examptionLimitother" placeholder="Enter Examiption Limit" required>
    </div>
     <div class="form-group col-md-3">
      <label for="comptFormulaother">Formula Description</label>
      <input type="text" size="50" maxlength="50" class="form-control" id="comptFormulaother" name="comptFormulaother" placeholder="Enter Component Formula" required>
    </div>

  </div>
  <div class="form-row">
        <div class="form-group col-md-3">
          <input type="hidden" class="form-control" id="rowIdother" name="rowIdother">
        </div>
        <div class="form-group col-md-3">
          <button id="btnSaveother" name="btnSaveother" type="submit" class="btn btn-success">Save</button>
        </div>
        <div class="form-group col-md-3">
          <button id="btnCancelother" name="btnCancelother" type="button" class="btn btn-primary">Reset/Cancel</button>
        </div>
        <div class="form-group col-md-3">

        </div>
      </div>
</form>

{{-- end form Other--}}

{{-- Data Table Start Other --}}
<div class="table-responsive-md" id="loadRecordTableOther">
<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Component Id</th>
                                <th>Component Name</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody id="otherTbody">

{{-- <h1> Loadding....</h1> --}}
                            </tbody>
</table>
</div>
{{-- Data Table End Other--}}
</div>
</div>
{{-- Model for View Earning --}}
<div class="modal fade" id="viewRecord" tabindex="-1" role="dialog" aria-labelledby="viewRecordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewRecordLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="viewContent">

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- End Model --}}
{{-- Model for View Deduction --}}
<div class="modal fade" id="viewRecordDeduction" tabindex="-1" role="dialog" aria-labelledby="viewRecordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewRecordLabelDeduction">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="viewContentDeduction">

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- End Model --}}
{{-- Model for View Other--}}
<div class="modal fade" id="viewRecordOther" tabindex="-1" role="dialog" aria-labelledby="viewRecordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewRecordLabelOther">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="viewContentOther">

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- End Model --}}
@endsection

@section('script')
<script type="text/javascript">
$('#btnEarning').on('click',function(){
        $('#deductionDetails').collapse('hide');
        $('#earningDetails').collapse('show');
        $('#otherDetails').collapse('hide');
        $("#btnEarning").prop('disabled', true);
        $("#btnDeduction").prop('disabled', false);
        $("#btnOther").prop('disabled', false);

    });
    $('#btnDeduction').on('click',function(){
        $('#deductionDetails').collapse('show');
        $('#earningDetails').collapse('hide');
        $('#otherDetails').collapse('hide');
        $("#btnDeduction").prop('disabled', true);
        $("#btnEarning").prop('disabled', false);
        $("#btnOther").prop('disabled', false);


    });

    $('#btnOther').on('click',function(){
        $('#deductionDetails').collapse('hide');
        $('#earningDetails').collapse('hide');
        $('#otherDetails').collapse('show');
        $("#btnOther").prop('disabled', true);
        $("#btnEarning").prop('disabled', false);
        $("#btnDeduction").prop('disabled', false);

    });
$(document).ready(function(){
        $(document).ajaxStart(function () {
            $("#loadingmessage").show();
        }).ajaxStop(function () {
            $("#loadingmessage").hide();
        });
        loadName();
        displayRecords();
        // loadRecordTable();
        // Select Initialization Earning Start
        $('.selectcomptName').select2({
                  placeholder: 'Select Component Name',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectcalcType').select2({
                  placeholder: 'Select Component Calc Type',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectcalcAttendance').select2({
                  placeholder: 'Select Calc Attendance',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectconsdWeekOff').select2({
                  placeholder: 'Select Consider Week off',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectconsdPubHoliday').select2({
                  placeholder: 'Select Consider Public Holiday',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectroundOff').select2({
                  placeholder: 'Select Round off',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectprintIfZero').select2({
                  placeholder: 'Select Print if zero',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selecttdsHead').select2({
                  placeholder: 'Select Print if zero',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        // Select Initialization Earning End
        // Select Initialization Deduction Start
        $('.selectcomptNamededuction').select2({
                  placeholder: 'Select Component Name',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectcalcTypededuction').select2({
                  placeholder: 'Select Component Calc Type',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectcalcAttendancededuction').select2({
                  placeholder: 'Select Calc Attendance',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectconsdWeekOffdeduction').select2({
                  placeholder: 'Select Consider Week off',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectconsdPubHolidaydeduction').select2({
                  placeholder: 'Select Consider Public Holiday',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectroundOffdeduction').select2({
                  placeholder: 'Select Round off',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectprintIfZerodeduction').select2({
                  placeholder: 'Select Print if zero',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selecttdsHeaddeduction').select2({
                  placeholder: 'Select Print if zero',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        // Select Initialization Deduction End
        // Select Initialization Other Start
        $('.selectcomptNameother').select2({
                  placeholder: 'Select Component Name',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectcalcTypeother').select2({
                  placeholder: 'Select Component Calc Type',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectcalcAttendanceother').select2({
                  placeholder: 'Select Calc Attendance',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectconsdWeekOffother').select2({
                  placeholder: 'Select Consider Week off',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectconsdPubHolidayother').select2({
                  placeholder: 'Select Consider Public Holiday',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectroundOffother').select2({
                  placeholder: 'Select Round off',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selectprintIfZeroother').select2({
                  placeholder: 'Select Print if zero',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        $('.selecttdsHeadother').select2({
                  placeholder: 'Select Print if zero',
                  dropdownAutoWidth : true,
                  width: '100%'
                });
        // Select Initialization Other End
});

$('.selectcomptName').on('select2:select', function (e) {
        var id = $('.selectcomptName').val();
        $('#calcCode').val(id);
        var data = $(".selectcomptName option:selected").text();
        $("#txtComptName").val(data);
        $("#comptDesc").val(data);
        //alert(data);
        //alert(e.currentTarget.textContent);
      });
$('.selectcomptNamededuction').on('select2:select', function (e) {
        var id = $('.selectcomptNamededuction').val();
        $('#calcCodededuction').val(id);
        var data = $(".selectcomptNamededuction option:selected").text();
        $("#txtComptNamededuction").val(data);
        $("#comptDescdeduction").val(data);
        //alert(data);
        //alert(e.currentTarget.textContent);
      });
$('.selectcomptNameother').on('select2:select', function (e) {
        var id = $('.selectcomptNameother').val();
        $('#calcCodeother').val(id);
        var data = $(".selectcomptNameother option:selected").text();
        $("#txtComptNameother").val(data);
        $("#comptDescother").val(data);
        //alert(data);
        //alert(e.currentTarget.textContent);
      });
function loadName()
{
    $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    $.ajax({
            url:'{{route('salarycomponentallocationload')  }}',
            method: 'post',
            data: {
              key:'comptName'

            },
            dataType: 'json',
            success:function(response){

                var len = response.length;
                //alert(len);
                //console.log("Response"+response);
                $(".selectcomptName").empty();
                $(".selectcomptName").append("<option value='-1'>---- Select Name ----</option>");
                $(".selectcomptNamededuction").empty();
                $(".selectcomptNamededuction").append("<option value='-1'>---- Select Name ----</option>");
                $(".selectcomptNameother").empty();
                $(".selectcomptNameother").append("<option value='-1'>---- Select Name ----</option>");
                for( var i = 0; i<len; i++){


                    var cName = response[i]['cName'];
                    var calcCode = response[i]['calcCode'];
                    var cTypeId = response[i]['cTypeId'];
                    if(cTypeId==1)
                        $(".selectcomptName").append("<option value='"+calcCode+"'>"+cName+"</option>");
                    if(cTypeId==2)
                        $(".selectcomptNamededuction").append("<option value='"+calcCode+"'>"+cName+"</option>");
                    if(cTypeId==3)
                        $(".selectcomptNameother").append("<option value='"+calcCode+"'>"+cName+"</option>");

                }

            }
        });
    $.ajax({
            url:'{{route('salarycomponentallocationload')  }}',
            method: 'post',
            data: {
              key:'tdsHead'
            },
            dataType: 'json',
            success:function(response){

                var len = response.length;
                //console.log("Response"+response);
                $(".selecttdsHead").empty();
                $(".selecttdsHead").append("<option value='-1'>---- Select TDS Head ----</option>");
                $(".selecttdsHeaddeduction").empty();
                $(".selecttdsHeaddeduction").append("<option value='-1'>---- Select TDS Head ----</option>");
                $(".selecttdsHeadother").empty();
                $(".selecttdsHeadother").append("<option value='-1'>---- Select TDS Head ----</option>");
                for( var i = 0; i<len; i++){


                    var tdsHeadId = response[i]['tdsHeadId'];
                    var tdsHeadName = response[i]['tdsHeadName'];

                    $(".selecttdsHead").append("<option value='"+tdsHeadId+"'>"+tdsHeadName+"</option>");
                    $(".selecttdsHeaddeduction").append("<option value='"+tdsHeadId+"'>"+tdsHeadName+"</option>");
                    $(".selecttdsHeadother").append("<option value='"+tdsHeadId+"'>"+tdsHeadName+"</option>");

                }

            }
        });



}
    function displayRecords(){
        $.ajax({
            url:'{{route('salarycomponentallocationdisplay')  }}',
            method :'get',
            success:function(response){
                // console.log(response);
                obj = JSON.parse(response);
                // console.log(obj[0]["Earning"]);
                $('#earingTbody').empty();
                $('#deductTbody').empty();
                $('#otherTbody').empty();
                $('#earingTbody').append(obj[0]["Earning"]);
                $('#deductTbody').append(obj[0]["Deduction"]);
                $('#otherTbody').append(obj[0]["Other"]);
                $('table').DataTable();
        }
        });
    }
    $('#btnCancel').click(function (){
        $('#frmEarningComponent')[0].reset();
        $('#btnSave').text('Save');
        Swal.fire(
            'Reset',
            'Reset for enter new record',
           'success'
                        );
    });
    $('#frmEarningComponent').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSave').text();
        if(btnSaveText=='Save')
        {
            $('.message').html("Record Insert");
            $.ajax({
            url: '{{ route('salarycomponentallocationstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.message').html(response.rowmessage);
                    //$('#frmEarningComponent')[0].reset();
                    displayRecords();
                    $('#btnSave').text('Save');
                    Swal.fire(
                        'Saved',
                        response.rowmessage,
                        'success'
                        );
                }else{
                    //alert('Server Error');
                    var errormessages = "";
                    $.each(response.errors,function(key,errormessge){
                        errormessages = errormessages + errormessge + "</br>";
                        //console.log(errormessge);
                    });
                    //console.log(response.errors);
                    $('.message').html(errormessages);
                    Swal.fire(
                        'Error in save',
                        errormessages,
                        'error'
                        );
                }
            }
        });

            //manageData('Insert');
        }
        if(btnSaveText=='Update')
        {
            Swal.fire({
                title: 'Do you want to update the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'update',
                denyButtonText: `Don't update`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('.message').html("Record Update");
                        $.ajax({
                        url: '{{ route('salarycomponentallocationupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.message').html(response.rowmessage);
                                //$('#frmEarningComponent')[0].reset();
                                displayRecords();
                                $('#btnSave').text('Save');
                                Swal.fire('1 Record Updated!', '', 'success')
                            }else{
                                //alert('Server Error');
                                var errormessages = "";
                                $.each(response.errors,function(key,errormessge){
                                    errormessages = errormessages + errormessge + "</br>";
                                    //console.log(errormessge);
                                });
                                //console.log(response.errors);
                                $('.message').html(errormessages);
                                Swal.fire('Error in Upadte!', errormessages, 'error')
                            }
                        }
                    });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not Updated', '', 'info')
                }
            });

        }

        //alert('done');
        //console.log(fd);

    });
    $('#frmdeductionComponent').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSavededuction').text();
        if(btnSaveText=='Save')
        {
            $('.messageDeduction').html("Record Insert");
            $.ajax({
            url: '{{ route('salarycomponentallocationstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.messageDeduction').html(response.rowmessage);
                   // $('#frmdeductionComponent')[0].reset();
                    displayRecords();
                    $('#btnSavededuction').text('Save');
                    Swal.fire(
                        'Saved',
                        response.rowmessage,
                        'success'
                        );
                }else{
                    //alert('Server Error');
                    var errormessages = "";
                    $.each(response.errors,function(key,errormessge){
                        errormessages = errormessages + errormessge + "</br>";
                        //console.log(errormessge);
                    });
                    //console.log(response.errors);
                    $('.messageDeduction').html(errormessages);
                    Swal.fire(
                        'Error in save',
                        errormessages,
                        'error'
                        );
                }
            }
        });

            //manageData('Insert');
        }
        if(btnSaveText=='Update')
        {
            Swal.fire({
                title: 'Do you want to update the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'update',
                denyButtonText: `Don't update`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('.messageDeduction').html("Record Update");
                        $.ajax({
                        url: '{{ route('salarycomponentallocationupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.messageDeduction').html(response.rowmessage);
                                //$('#frmdeductionComponent')[0].reset();
                                displayRecords();
                                $('#btnSavededuction').text('Save');
                                Swal.fire('1 Record Updated!', '', 'success')
                            }else{
                                //alert('Server Error');
                                var errormessages = "";
                                $.each(response.errors,function(key,errormessge){
                                    errormessages = errormessages + errormessge + "</br>";
                                    //console.log(errormessge);
                                });
                                //console.log(response.errors);
                                $('.messageDeduction').html(errormessages);
                                Swal.fire('Error in Upadte!', errormessages, 'error')
                            }
                        }
                    });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not Updated', '', 'info')
                }
            });

        }

        //alert('done');
        //console.log(fd);

    });
    $('#frmotherComponent').submit(function(e){
        e.preventDefault();
        fd = new FormData(this);
        var btnSaveText = $('#btnSaveother').text();
        if(btnSaveText=='Save')
        {
            $('.messageOther').html("Record Insert");
            $.ajax({
            url: '{{ route('salarycomponentallocationstore') }}',
            method : 'post',
            data: fd,
            processData: false,
            contentType: false,
            success:function(response){
                //console.log(response);
                if(response.status==200){
                    $('.messageOther').html(response.rowmessage);
                    //$('#frmotherComponent')[0].reset();
                    displayRecords();
                    $('#btnSaveother').text('Save');
                    Swal.fire(
                        'Saved',
                        response.rowmessage,
                        'success'
                        );
                }else{
                    //alert('Server Error');
                    var errormessages = "";
                    $.each(response.errors,function(key,errormessge){
                        errormessages = errormessages + errormessge + "</br>";
                        //console.log(errormessge);
                    });
                    //console.log(response.errors);
                    $('.messageOther').html(errormessages);
                    Swal.fire(
                        'Error in save',
                        errormessages,
                        'error'
                        );
                }
            }
        });

            //manageData('Insert');
        }
        if(btnSaveText=='Update')
        {
            Swal.fire({
                title: 'Do you want to update the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'update',
                denyButtonText: `Don't update`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $('.messageOther').html("Record Update");
                        $.ajax({
                        url: '{{ route('salarycomponentallocationupdate') }}',
                        method : 'post',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success:function(response){
                            //console.log(response);
                            if(response.status==200){
                                $('.messageOther').html(response.rowmessage);
                                //$('#frmotherComponent')[0].reset();
                                displayRecords();
                                $('#btnSaveother').text('Save');
                                Swal.fire('1 Record Updated!', '', 'success')
                            }else{
                                //alert('Server Error');
                                var errormessages = "";
                                $.each(response.errors,function(key,errormessge){
                                    errormessages = errormessages + errormessge + "</br>";
                                    //console.log(errormessge);
                                });
                                //console.log(response.errors);
                                $('.messageOther').html(errormessages);
                                Swal.fire('Error in Upadte!', errormessages, 'error')
                            }
                        }
                    });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not Updated', '', 'info')
                }
            });

        }

        //alert('done');
        //console.log(fd);

    });
    function editData(status,key,comptId){
        $('.message').html('Click Update button after changes');
        //console.log(comptId);
        $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('salarycomponentallocationedit')}}',
            method :'post',
            data: {
                comptId: comptId
            },
            success:function(response){
                if(key=='EditEarning')
                {
                    //console.log(response);
                    $('#btnSave').text('Update');
                    if(status==1){
                        $('#rowId').val(response.comptId);
                        var cname = response.comptName.replace(/\s/g, '');
                        //$('#calcCode').val(response.calcCode);
                        $('#calcCode').val(response.calcCode);
                        $('.selectcalcType').val(response.calcType).trigger('change');
                        // let long_name = response.comptName;
                        // let $element = $('.selectcomptName');
                        // let val = $element.find("option:contains('"+long_name+"')").val();
                        // $element.val(val).trigger('change');
                        // $('.selectcomptName').val($(".selectcomptName option:contains('"+response.comptName+"')").val()).trigger('change');

                        $('.selectcomptName').val(cname).trigger('change');
                        $('#txtComptName').val(response.comptName);
                        $('#comptDesc').val(response.comptDesc);
                        $('#cTypeId').val(response.cTypeId);
                        $('#comptFormula').val(response.comptFormula);
                        $('.selectcalcAttendance').val(response.calcAttendance).trigger('change');
                        $('.selectconsdWeekOff').val(response.consdWeekOff).trigger('change');
                        $('.selectconsdPubHoliday').val(response.consdPubHoliday).trigger('change');
                        $('.selectroundOff').val(response.roundOff).trigger('change');
                        $('.selectprintIfZero').val(response.printIfZero).trigger('change');
                        $('#printOrder').val(response.printOrder);
                        $('#tdsHead').val(response.tdsHead).trigger('change');
                        $('#calcOrder').val(response.calcOrder);
                        //$('#companyId').val(response.companyId);
                        $('#examptionLimit').val(response.examptionLimit);
                        // $('#comptName').val(response.comptName);
                        $('#comptName').val(response.comptName).trigger('change');


                        topFunction();

                    }
                    else{
                        //alert('view');
                        $('#viewRecordLabel').html("Component Name:-"+ response.comptName);
                        $('#viewRecord').modal('show');
                        var view = "Component Id :" + response.comptId  + "<br> Component Name :-" + response.comptName +"<br> Component Calculation Name :-" + response.calcCode ;
                        $('#viewContent').html(view);
                    }
                }
                if(key=='EditDeduction'){
                    //console.log(response);
                    $('#btnSavededuction').text('Update');
                    if(status==1){
                        $('#rowIddeduction').val(response.comptId);
                        var cname = response.comptName.replace(/\s/g, '');
                        //$('#calcCode').val(response.calcCode);
                        $('#calcCodededuction').val(response.calcCode);
                        $('.selectcalcTypededuction').val(response.calcType).trigger('change');
                        // let long_name = response.comptName;
                        // let $element = $('.selectcomptName');
                        // let val = $element.find("option:contains('"+long_name+"')").val();
                        // $element.val(val).trigger('change');
                        // $('.selectcomptName').val($(".selectcomptName option:contains('"+response.comptName+"')").val()).trigger('change');

                        $('.selectcomptNamededuction').val(cname).trigger('change');
                        $('#txtComptNamededuction').val(response.comptName);
                        $('#comptDescdeduction').val(response.comptDesc);
                        $('#cTypeIddeduction').val(response.cTypeId);
                        $('#comptFormuladeduction').val(response.comptFormula);
                        $('.selectcalcAttendancededuction').val(response.calcAttendance).trigger('change');
                        $('.selectconsdWeekOffdeduction').val(response.consdWeekOff).trigger('change');
                        $('.selectconsdPubHolidaydeduction').val(response.consdPubHoliday).trigger('change');
                        $('.selectroundOffdeduction').val(response.roundOff).trigger('change');
                        $('.selectprintIfZerodeduction').val(response.printIfZero).trigger('change');
                        $('#printOrderdeduction').val(response.printOrder);
                        $('#tdsHeaddeduction').val(response.tdsHead).trigger('change');
                        $('#calcOrderdeduction').val(response.calcOrder);
                        //$('#companyId').val(response.companyId);
                        $('#examptionLimitdeduction').val(response.examptionLimit);
                        // $('#comptName').val(response.comptName);
                        $('#comptNamededuction').val(response.comptName).trigger('change');


                        topFunction();

                    }
                    else{
                        //alert('view');
                        $('#viewRecordLabel').html("Component Name:-"+ response.comptName);
                        $('#viewRecord').modal('show');
                        var view = "Component Id :" + response.comptId  + "<br> Component Name :-" + response.comptName +"<br> Component Calculation Name :-" + response.calcCode ;
                        $('#viewContent').html(view);
                    }
                }
                if(key=='EditOther'){
                    //console.log(response);
                    $('#btnSaveother').text('Update');
                    if(status==1){
                        $('#rowIdother').val(response.comptId);
                        var cname = response.comptName.replace(/\s/g, '');
                        //$('#calcCode').val(response.calcCode);
                        $('#calcCodeother').val(response.calcCode);
                        $('.selectcalcTypeother').val(response.calcType).trigger('change');
                        // let long_name = response.comptName;
                        // let $element = $('.selectcomptName');
                        // let val = $element.find("option:contains('"+long_name+"')").val();
                        // $element.val(val).trigger('change');
                        // $('.selectcomptName').val($(".selectcomptName option:contains('"+response.comptName+"')").val()).trigger('change');

                        $('.selectcomptNameother').val(cname).trigger('change');
                        $('#txtComptNameother').val(response.comptName);
                        $('#comptDescother').val(response.comptDesc);
                        $('#cTypeIdother').val(response.cTypeId);
                        $('#comptFormulaother').val(response.comptFormula);
                        $('.selectcalcAttendanceother').val(response.calcAttendance).trigger('change');
                        $('.selectconsdWeekOffother').val(response.consdWeekOff).trigger('change');
                        $('.selectconsdPubHolidayother').val(response.consdPubHoliday).trigger('change');
                        $('.selectroundOffother').val(response.roundOff).trigger('change');
                        $('.selectprintIfZeroother').val(response.printIfZero).trigger('change');
                        $('#printOrderother').val(response.printOrder);
                        $('#tdsHeadother').val(response.tdsHead).trigger('change');
                        $('#calcOrderother').val(response.calcOrder);
                        //$('#companyId').val(response.companyId);
                        $('#examptionLimitother').val(response.examptionLimit);
                        // $('#comptName').val(response.comptName);
                        $('#comptNameother').val(response.comptName).trigger('change');


                        topFunction();

                    }
                    else{
                        //alert('view');
                        $('#viewRecordLabel').html("Component Name:-"+ response.comptName);
                        $('#viewRecord').modal('show');
                        var view = "Component Id :" + response.comptId  + "<br> Component Name :-" + response.comptName +"<br> Component Calculation Name :-" + response.calcCode ;
                        $('#viewContent').html(view);
                    }
                }


        }
        });

    }
    function deleteData(status,key,comptId){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                 $.ajaxSetup({
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{route('salarycomponentallocationdelete')  }}',
                    method :'post',
                    data: {
                        comptId: comptId
                    },
                    success:function(response){
                        if(response.status==200){
                            $('.message').html(response.rowmessage);
                            displayRecords();
                        }else{
                            $('.message').html('Error In Delete');
                        }
                    }
                });
                Swal.fire(
                'Deleted!',
                '1 Record deleted.',
                'success'
                )
            }
            });

    }
</script>
@endsection
