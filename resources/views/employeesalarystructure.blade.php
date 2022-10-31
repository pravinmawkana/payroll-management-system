@extends('layout.main')
@push('title')
    <title>Employee Salary Structure </title>

@endpush
@section('page-name')
    Employee Salary Structure
@endsection
@section('main-content')
<div class="container-fluid">
    <div id="salaryStructure" style="display: none">
        Salary Structure
        <form id="salaryStructureForm" >
        <div class="row">
            <div class="col-md-4">
                <label for="empCode">Employee Code</label>
                <input type="text" class="form-control" id="empCode" name="empCode" placeholder="Enter Employee Code" required readonly>
            </div>
            <div class="col-md-4">
                <label for="empName">Employee Name</label>
                <input type="text" class="form-control" id="empName" name="empName" placeholder="Enter Employee Name" required readonly>
            </div>

            <div class="col-md-4">
                <label for="sStructDate">Salary Strature Effective Date</label>
                <input type="text" class="form-control date-picker" id="sStructDate" name="sStructDate" placeholder="Enter Slary Structure Effective Date" required readonly>
            </div>
        </div>
        <div class="row">

                <div class="col-md-4" id="earning">
                    Earning
                </div>
                <div class="col-md-4" id="deduction">
                    Deduction
                </div>
                <div class="col-md-4" id="other">
                    Other
                </div>

        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input type="hidden" class="form-control" id="rowId" name="rowId">

                <button id="btnSave" name="btnSave" type="submit" class="btn btn-success">Save</button>

            <button id="btnCancel" name="btnCancel" type="button" class="btn btn-primary">Reset/Cancel</button>
            </div>
           <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-md-4">
                        Gross Salary <input type="text" value = "0" class="form-control" id="GroossSalary" name="GroossSalary" placeholder="Enter Employee Code" required readonly>
                    </div>
                    <div class="form-group col-md-4">
                        Total Deducation  <input type="text" value = "0" class="form-control" id="DeductionSalary" name="DeductionSalary" placeholder="Enter Employee Code" required readonly>
                    </div>
                    <div class="form-group col-md-4">
                        Net Pay  <input type="text" value = "0" class="form-control" id="NetSalary" name="NetSalary" placeholder="Enter Employee Code" required readonly>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
{{-- Data Table Start Employee List--}}
<div class="table-responsive-md" id="loadRecordTable">
<table class="table table-bordered table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>Emp Id</th>
                                <th>Employee Name</th>
                                <th>Branch</th>
                                {{-- <th>Designation</th>
                                <th>Grade</th>
                                <th>Catagory</th>
                                <th>Division</th>
                                <th>Project</th>
                                <th>Unit Name</th>
                                <th>Date of Joinning</th>
                                <th>PF</th>
                                <th>ESIC</th>
                                <th>PF</th> --}}
                                <th>Edit</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody id="employeListBody">

{{-- <h1> Loadding....</h1> --}}
                            </tbody>
</table>
</div>
{{-- Data Table End Employee List --}}
</div>
@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
        $(document).ajaxStart(function () {
            $("#loadingmessage").show();
        }).ajaxStop(function () {
            $("#loadingmessage").hide();
        });
        // loadName();
        displayRecords();
        loadComponent(1,'earning');
        loadComponent(2,'deduction');
        loadComponent(3,'other');

    });

    function getEmpAge(){
        return 35;
    }
    function getProfessonalTax(){
        //if grosssalary <=11999 then 200 , else 0; pay on hand
        return 200;
    }
    $('#btnSave').on('click',function(){

        alert('save');
        $('#salaryStructure').hide();
    });
    $('#salaryStructureForm').submit(function(e){
         e.preventDefault();
        fd = new FormData(this);

            $('.messageOther').html("Record Insert");
            $.ajax({
            url: '{{ route('employeesalarystructurestore') }}',
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

    });
   function calculation(){
        //PFWages =[Basic Salary]  if [Basic Salary]>15000 then  final=15000  end if  If [User Defined Other2]=1 then  Final=[Basic Salary]  End if


        var BasicSalary =Math.round( $('#BasicSalary').val());
        if(!$.isNumeric(BasicSalary))
        {
            alert("Enter Valide Amount");
            $('#BasicSalary').val('0');
            $('#BasicSalary').focus();
            return;
        }
        var HouseRentAllowance =Math.round( $('#HouseRentAllowance').val());
        if(!$.isNumeric(HouseRentAllowance))
        {
            alert("Enter Valide Amount");
            $('#HouseRentAllowance').val('0');
            $('#HouseRentAllowance').focus();
            return;
        }
        var ConveyanceAllowance =Math.round( $('#ConveyanceAllowance').val());
        if(!$.isNumeric(ConveyanceAllowance))
        {
            alert("Enter Valide Amount");
            $('#ConveyanceAllowance').val('0');
            $('#ConveyanceAllowance').focus();
            return;
        }
        var SpecialAllowance =Math.round( $('#SpecialAllowance').val());
        if(!$.isNumeric(SpecialAllowance))
        {
            alert("Enter Valide Amount");
            $('#SpecialAllowance').val('0');
            $('#SpecialAllowance').focus();
            return;
        }
        var OtherAllowance = $('#OtherAllowance').val();
        var Incentive = $('#Incentive').val();
        var SpotIncentive = $('#SpotIncentive').val();
        var LeaveEncashment = $('#LeaveEncashment').val();
        var CSIIncentive = $('#CSIIncentive').val();
        var SpecialBonus = $('#SpecialBonus').val();
        var PerformanceBonus = $('#PerformanceBonus').val();
        var Bonus = $('#Bonus').val();
        var OtherSalary = $('#OtherSalary').val();
        if(!$.isNumeric(OtherSalary))
        {
            alert("Enter Valide Amount");
            $('#OtherSalary').val('0');
            $('#OtherSalary').focus();
            return;
        }
        var ArrearsSalary = $('#ArrearsSalary').val();
        var ProfessionalTaxDeduction = getProfessonalTax();
        $('#ProfessionalTaxDeduction').val(ProfessionalTaxDeduction);
        //MasterGross=[M_Basic Salary]+[M_House Rent Allowance]+[M_Convayence Allowance]+[M_Special Allowance]
        var MasterGross = BasicSalary +HouseRentAllowance+ConveyanceAllowance+SpecialAllowance;
        $('#MasterGross').val(MasterGross);


        var PFWages = BasicSalary;
        if(BasicSalary>15000)
            PFWages = 15000;
        $('#PFWages').val(PFWages);

        //PensionWage=[PF Wages]  if [PF Wages]>15000 then  Final=15000  End if  if [Age]>=58 then  Final=0  End if
        var PensionWage = PFWages;
        if(getEmpAge()>=58)
            PensionWage=0;
        $('#PensionWage').val(PensionWage);

        //EPSEmployer=([Pension Wage])*8.33/100
        var EPSEmployer = Math.round((PensionWage*8.33)/100);
        $('#EPSEmployer').val( EPSEmployer);

        //EPFEmployer = A=[PF Wages]*12/100  Final=A - [EPS Employer]
        var EPFEmployerA = (PFWages*12)/100;
        var EPFEmployer = Math.round(EPFEmployerA - EPSEmployer);
        $('#EPFEmployer').val(EPFEmployer);

        //PFAdminCharge=[PF Wages]*0.65/100
        var PFAdminCharge =Math.round((PFWages*0.65)/100);
        $('#PFAdminCharge').val(PFAdminCharge);

        //EDLIWage=[PF Wages]  if [PF Wages]>15000 then  Final=15000  End if
        var EDLIWage = PFWages;
        if(PFWages>15000)
            EDLIWage = 15000;
        $('#EDLIWage').val(EDLIWage);

        //EDLIAdmin=[EDLI Wage]*0/100
        var EDLIAdmin =0;
        $('#EDLIAdmin').val(EDLIAdmin);

        //EDLIEmployer=[EDLI Wage]*0.5/100
        var EDLIEmployer = Math.round((EDLIWage*0.5)/100);
        $('#EDLIEmployer').val(EDLIEmployer);

        //ESICWage=[GrossSalary]  check=[Gross_Salary_Structure]  if check>21000 then  if [CurrentMonth]=4 or [CurrentMonth]=10 then  Final=0  End if  End if
        var ESICWage = MasterGross;
        const d = new Date();
        let month = d.getMonth()+1;
        if(MasterGross>21000)
        {
            if(month==4 || month==10)
                ESICWage=0;
        }
        $('#ESICWage').val(ESICWage);

        //ESICEmployer=([ESIC Wage]*3.25/100)+0.49
        var ESICEmployer =((ESICWage*3.25)/100)+0.49;
        $('#ESICEmployer').val(Math.round(ESICEmployer));

        var PFControl = $('#PFControl').val();
        if(!$.isNumeric(PFControl))
        {
            alert("Enter Valide Amount");
            $('#PFControl').val('0');
            $('#PFControl').focus();
            return;
        }
        //ProvidentFund=[PF Wages]*12/100
        var ProvidentFund = Math.round((PFWages*12)/100);
        $('#ProvidentFund').val(ProvidentFund);

        //Final=([ESIC Wage]*0.75/100)+0.49
        var ESIC = Math.round(((ESICWage*0.75)/100)+0.49);
        $('#ESIC').val(ESIC);
        var TDS = $('#TDS').val();
        var OtherDeduction = $('#OtherDeduction').val();
        var Loan = $('#Loan').val();
        var MobileDeduction = $('#MobileDeduction').val();
        var SalaryAdvance = $('#SalaryAdvance').val();
        var LatePresent = $('#LatePresent').val();
        var SecurityDeposite = $('#SecurityDeposite').val();

        var GroossSalary = parseInt(BasicSalary)+ parseInt( HouseRentAllowance)+ parseInt( ConveyanceAllowance)+ parseInt(SpecialAllowance)+ parseInt( OtherAllowance)+ parseInt( Incentive)+ parseInt(SpotIncentive)+ parseInt(LeaveEncashment)+parseInt(CSIIncentive)+parseInt(SpecialBonus)+parseInt(PerformanceBonus)+parseInt(Bonus)+parseInt(OtherSalary)+parseInt( ArrearsSalary)+ parseInt(ProvidentFund)+parseInt(ESIC)+parseInt(TDS)+parseInt(OtherDeduction)+parseInt(Loan)+parseInt(SalaryAdvance)+parseInt(MobileDeduction)+parseInt(LatePresent)+parseInt(SecurityDeposite)+parseInt(ProfessionalTaxDeduction);

        var DeductionSalary= parseInt(ProvidentFund)+ parseInt(ESIC)+ parseInt(TDS)+ parseInt(OtherDeduction)+ parseInt(Loan)+ parseInt(SalaryAdvance)+ parseInt(MobileDeduction)+ parseInt(LatePresent)+ parseInt(SecurityDeposite)+ parseInt(ProfessionalTaxDeduction);

        var NetSalary= GroossSalary-DeductionSalary;

        $('#GroossSalary').val(GroossSalary);
        $('#DeductionSalary').val(DeductionSalary);
        $('#NetSalary').val(NetSalary);








    }
function displayRecords(){
        $.ajax({
            url:'{{route('employeesalarystructuredisplay')  }}',
            method :'get',
            success:function(response){
                // console.log(response);
                // obj = JSON.parse(response);
                // console.log(obj[0]["Earning"]);
                $('#employeListBody').empty();
                // $('#deductTbody').empty();
                // $('#otherTbody').empty();
                $('#employeListBody').append(response);
                // $('#deductTbody').append(obj[0]["Deduction"]);
                // $('#otherTbody').append(obj[0]["Other"]);
                $('table').DataTable();
        }
        });
    }

function editData(status,key,empId,empCode,empName){
    $('#salaryStructure').show();
    $('.message').html('Click Update button after changes');
        //console.log(comptId);
        $.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{route('employeesalarystructureedit')}}',
            method :'post',
            data: {
                empId: empId
            },
            success:function(response){
                $('#rowId').val(response.sStructId)
                $('#empCode').val(empCode);
                $('#empName').val(empName);
                $('#BasicSalary').val(response.BasicSalary);
                $('#HouseRentAllowance').val(response.HouseRentAllowance);
                $('#ConveyanceAllowance').val(response.ConveyanceAllowance);
                $('#SpecialAllowance').val(response.SpecialAllowance);
                $('#OtherAllowance').val(response.OtherAllowance);
                $('#Incentive').val(response.Incentive);
                $('#SpotIncentive').val(response.SpotIncentive);
                $('#LeaveEncashment').val(response.LeaveEncashment);
                $('#CSIIncentive').val(response.CSIIncentive);
                $('#SpecialBonus').val(response.SpecialBonus);
                $('#PerformanceBonus').val(response.PerformanceBonus);
                $('#Bonus').val(response.Bonus);
                $('#OtherSalary').val(response.OtherSalary);
                $('#ArrearsSalary').val(response.ArrearsSalary);

                $('#ProvidentFund').val(response.ProvidentFund);
                $('#ESIC').val(response.ESIC);
                $('#TDS').val(response.TDS);
                $('#OtherDeduction').val(response.OtherDeduction);
                $('#Loan').val(response.Loan);
                $('#MobileDeduction').val(response.MobileDeduction);
                $('#SalaryAdvance').val(response.SalaryAdvance);
                $('#LatePresent').val(response.LatePresent);
                $('#SecurityDeposite').val(response.SecurityDeposite);
                $('#ProfessionalTaxDeduction').val(response.ProfessionalTaxDeduction);


                $('#PFWages').val(response.PFWages);
                $('#PensionWage').val(response.PensionWage);
                $('#EPSEmployer').val(response.EPSEmployer);
                $('#EPFEmployer').val(response.EPFEmployer);
                $('#PFAdminCharge').val(response.PFAdminCharge);
                $('#EDLIWage').val(response.EDLIWage);
                $('#EDLIAdmin').val(response.EDLIAdmin);
                $('#EDLIEmployer').val(response.EDLIEmployer);
                $('#ESICWage').val(response.ESICWage);
                $('#ESICEmployer').val(response.ESICEmployer);
                $('#MasterGross').val(response.MasterGross);
                $('#PFControl').val(response.PFControl);
                $('#sStructDate').val(getFormattedDate( response.sStructDate));
                topFunction();
            }

        });
}
function getFormattedDate(date) {
    date = new Date(date);
    let year = date.getFullYear();
    let month = (1 + date.getMonth()).toString().padStart(2, '0');
    let day = date.getDate().toString().padStart(2, '0');

    return day  + '/' + month + '/' + year;
}
function loadComponent(componentType,cName){
     $.ajax({
            url:'{{route('getsalarycomponent')  }}',
            method :'get',
            data : {
                componentType: componentType
            },
            success:function(response){
                 //console.log(response);

                $('#'+cName).empty();

                $('#'+cName).append(response);


        }
        });
}
</script>
@endsection
