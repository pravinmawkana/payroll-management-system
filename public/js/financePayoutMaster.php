<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Admin panel">
  <meta name="author" content="Mr. Pravin Makwana">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="img/EquityLogo.jpg">

  <title>Finance Payout Master -Equity Hyuindai,Rajkot</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Data table CSS -->
  <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css">
  <!-- Awesome fone css  -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!-- Bootstrap Select2 CSS -->
  <link rel="stylesheet" type="text/css" href="css/select2.min.css">
  <!-- Toastr css  -->
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  <style >
  #loadingmessage {
     
     position: absolute;
     left: 50%;
     top: 50%;     
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -100px; 
     
     
     background-color: #fefefe;
     z-index: 99;
    
 }
 
  </style>
  </head>

<body>
  
<div class="container-fluid">



<div id='loadingmessage' style='display:none'>
  <img src='img/loading_spinner.gif'/>
</div>

 <?php
  if(isset($_SESSION['userRigts']))
  {
    if ($_SESSION['userRigts']=="Admin")
    {
      include_once("adminNavigation.php");
    }
    if ($_SESSION['userRigts']=="Oprator")
    {
      include_once("opratorNavigation.php");
    }
    if ($_SESSION['userRigts']=="Viewer")
    {
      include_once("viewerNavigation.php");
    }
    if ($_SESSION['userRigts']=="Finex")
    {
      include_once("finexNavigation.php");
    }
  }
  else
  {
    include_once("navigation.php");
  }

?>
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"></i> Finance Payout Master By
    <?php if(isset($_SESSION['userName']))
                { 
                  echo $_SESSION['userName'];
                }
                else
                {
                  echo "Guest";
                  header('Location: index.php');
                  }?></h3>
    </h3>
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Finance Payout Master</li>
  </ol>
</nav>
  </div>
</div>


<form name="frmFinancePayout" id="frmFinancePayout" method="post" action="financePayoutMasterOnServer.php">
      <div class="form-row">      
       <div class="form-group col-md-6">
        <h3>Finance Payout Details</h3>
        </div>
        <div class="form-group col-md-6">
        <div><h3 class="message"></h3></div>
        </div>
      </div>
      <div id='InvoiceDetails'>
      <h6>Invoice Details</h6>
      <div class="form-row">      
      <div class="form-group col-md-2">
          <label for="custId">Customer Id</label>
          <input type="text" class="form-control" id="custId" readonly >
        </div>
        <div class="form-group col-md-4">
          <label for="customerName">Customer name</label>
          <select class="selectCustId" name="customerName">
              <option value="-1">---Select Costomer---</option>                  
          </select>
        </div>        
        <div class="form-group col-md-2">
          <label for="invoiceId">Invoice No</label>
          <select class="selectInvoiceId" name="invoiceId">
              <option value="-1">---Select Invoice No---</option>                  
          </select>
        </div>        
        <div class="form-group col-md-2">
          <label for="companyId">Company Id</label>
          <input type="text" class="form-control" id="companyId" readonly >
        </div>        
        <div class="form-group col-md-2">
          <label for="empId">Employee Id</label>
          <input type="text" class="form-control" id="empId" value="<?php if(isset($_SESSION['userid']))
                { 
                  echo $_SESSION['userid'];
                }
                else
                {                  
                  header('Location: index.php');
                  }?>" readonly>
        </div>
        <div class="form-group col-md-2">
          
        </div>        
      </div>
      <div class="form-row">       
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="vehicleId">Vehicle Id</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="vehicleId" placeholder="Enter vehicleId" readonly>
        </div>        
        <div class="form-group col-md-1">

          <button id="btnRefreshVehicle" type="button" class="btn btn-success btn-lg"><i class="fa fa-refresh"></i></button>
        </div>
        <div class="form-group col-md-3">
          <label style='font-size:11px' for="vehicleDetails">Vehicle Details</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="vehicleDetails" placeholder="Enter vehicleDetails" readonly>
        </div>        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="executiveName">executiveName</label>
          <input type="text" size="7" maxlength="7" style='font-size:11px' class="form-control" id="executiveName" placeholder="Enter executiveName" readonly>
        </div>        
        <div class="form-group col-md-2">          
          <label style='font-size:11px' for="selectHYPO">HYPO</label>
            <select class="selectHYPO" id="hypoId" style='font-size:11px' disabled="">
              <option value="0">---Select---</option>
            </select>        
        </div>                
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="loanAmount">Loan Amount</label>
          <input type="text" size="20" maxlength="20" style='font-size:11px' class="form-control" id="loanAmount" placeholder="Enter Loan Amount" readonly>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
            <input id="rowInvoiceId" type="hidden">          
        </div>
        <div class="form-group col-md-3">
          <button id="btnInvoiceSave" type="button" class="btn btn-success"><i class="fa fa-edit"></i>Invoice</button>
        </div>
        <div class="form-group col-md-3">
          <button id="btnInvoiceRefresh" type="button" class="btn btn-primary"><i class="fa fa-refresh"></i>Invoice</button>
        </div>        
        <div class="form-group col-md-3">
          
        </div>        
      </div>
      </div>
      <h6>Finance Payout Details</h6>
       <div class="form-row">
       <div class="form-group col-md-2">
          <label style='font-size:11px' for="invoiceId">Invoice Id</label>
          <input type="text" size="20" maxlength="20" style='font-size:11px' class="form-control" id="invoiceId" placeholder="Enter Invoice Id" readonly>
        </div>        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="EMI">EMI</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="EMI" placeholder="Enter EMI">
        </div>        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="pFees">Process Fees</label>
          <input type="text" size="7" maxlength="7" style='font-size:11px' class="form-control" id="pFees" placeholder="Process Fees">
        </div>        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="stampDuty">Stamp Ducty</label>
          <input type="text" size="25" maxlength="25" style='font-size:11px' class="form-control" id="stampDuty" placeholder="Stamp Ducty">
        </div>        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="disbusmentAmount">Disbusment Amount</label>
          <input type="text" size="150" maxlength="150" style='font-size:11px' class="form-control" id="disbusmentAmount" placeholder="Enter Disbusment Amount">
        </div>
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="financeRate">Finance Rate</label>
          <input type="text" size="20" maxlength="20" style='font-size:11px' class="form-control" id="financeRate" placeholder="Enter Finance Rate">
        </div>
      </div>

      <div class="form-row">        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="rateOperate">Rate Operate</label>
          <input type="text" size="10" maxlength="10" style='font-size:11px' class="form-control" id="rateOperate" placeholder="Enter Rate Operate">
        </div>
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="payOut">Payout</label>
          <input type="text" style='font-size:11px' size="15" maxlength="15" class="form-control" id="payOut" placeholder="Enter Payout">
        </div>
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="BKGAmount">BKG Amount</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="BKGAmount" placeholder="Enter BKG Amount">
        </div>        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="perFile">perFile</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="perFile" placeholder="Enter Per File">
        </div>
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="totalAmount">totalAmount</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="totalAmount" placeholder="Enter Total Amount">
        </div>
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="DPIncentive">DPIncentive</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="DPIncentive" placeholder="Enter DPIncentive">
        </div>
        
      </div>

      <div class="form-row">        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="slabIncentive">slabIncentive</label>
          <input type="text" size="10" maxlength="10" style='font-size:11px' class="form-control" id="slabIncentive" placeholder="Enter slabIncentive">
        </div>
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="grandTotal">grandTotal</label>
          <input type="text" style='font-size:11px' size="15" maxlength="15" class="form-control" id="grandTotal" placeholder="Enter grandTotal">
        </div>        
        <div class="form-group col-md-2">
          <label style='font-size:11px' for="ER">ER</label>
          <input type="text" size="15" maxlength="15" style='font-size:11px' class="form-control" id="ER" placeholder="Enter ER">
        </div>
                
      </div>


      

      <div class="form-row">
        <div class="form-group col-md-3">
            <input id="rowId" type="hidden">          
        </div>
        <div class="form-group col-md-3">
          <button id="btnSave" type="button" class="btn btn-success">Save</button>
        </div>
        <div class="form-group col-md-3">
          <button id="btnCancel" type="button" class="btn btn-primary">Reset/Cancel</button>
        </div>        
        <div class="form-group col-md-3">
          
        </div>        
      </div>
  </form>


<div class="table-responsive-md">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Id</th>
          <th>Invoice Id</th>
          <th>Customer Name</th>
        <!--  
          <th>Process Fees</th>
          <th>Model</th>
          <th>Veriant</th> 
          <th>Color</th>
          <th>payOut</th>
          <th>executiveName</th>
           -->
          <th>Edit</th>
          <th>View</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
</div>
<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewRecord">
  View Record
</button>
-->
<!-- Modal -->
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

<!-- Modal -->
<div class="modal fade" id="editHypo" tabindex="-1" role="dialog" aria-labelledby="editHypoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editHypoLabel">Edit Hypo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="viewHypoContent">
          <div class="form-row">
            <div class="form-group col-md-6">          
              <label style='font-size:11px' for="selectHYPO1">HYPO</label>
              <select class="selectHYPO1" id="hypoId1" style='font-size:11px' >
                <option value="0">---Select---</option>
              </select>        
            </div>                
            <div class="form-group col-md-6">
              <label style='font-size:11px' for="loanAmount1">Loan Amount</label>
              <input type="text" size="20" maxlength="20" style='font-size:11px' class="form-control" id="loanAmount1" placeholder="Enter Loan Amount">
            </div>
          </div>
          <button type="button" id='btnSaveHypo' class="btn btn-success">Save Hypo</button>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>
  



   <script src="js/myscript.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- validate Js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <!-- DataTable js-->
    <script src="js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>

    <!-- Bootstrap Select2 JS -->
    <script type="text/javascript" src="js/select2.min.js"></script>

    <script src="js/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

      //toastr.remove();
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
Command: toastr["success"]("<?php echo $_SESSION['userName']. 'Last Log In On '.   $_SESSION['lastLogOn']; ?>","Welcome");

       $(document).ajaxStart(function () {
        $("#loadingmessage").show();
    }).ajaxStop(function () {
        $("#loadingmessage").hide();
    });
  viewData('View',0,500);
  $('#btnCancel').on('click',function(){
      doEmptyText();
      $("#btnSave").html('Save');
      $('.message').html("Record Reset/Canceled");
      $('#InvoiceDetails').show();
  });
  $('#btnRefresh').on('click',function(){
     // $('tbody').empty();
      //viewData('View',0,10);
  });
  $('#btnInvoiceSave').on('click',function(){
    if($('#invoiceId').val()=='')
    {
      alert('Invoice Not Selected');  
      return;
    }
    
    $('#editHypo').modal('show');
  });
  $('#btnSaveHypo').on('click',function(){    
    //alert($('#invoiceId').val()+' ' + $('#loanAmount1').val() + ' ' + $('.selectHYPO1').val());
    updateInvoiceData('updateInvoiceData',$('#invoiceId').val(),$('#loanAmount1').val(),$('.selectHYPO1').val());
  });
  $('#btnSave').on('click',function(){
    //alert('ok');
    if($('#invoiceId').val()==''){
      alert('Please Select Invoice Details');
      return;
    }
    var btnSaveText = $('#btnSave').text();
    //alert(btnSaveText);
    if(btnSaveText=='Save')
    {
      $('.message').html("Record Insert");
      manageData('Insert');
    }
    if(btnSaveText=='Save Change')
    {
      $('.message').html("Record Update");
      updateData('Update',$('#rowId').val())

      //alert($('#rowId').val());
    }
    
  });
$.ajax({
            url: 'financePayoutMasterOnServer.php',
            method: 'post',
            data: {
              key :'ddlHYPO'
            },
            dataType: 'json',
            success:function(response){
             // obj = JSON.parse(response);
                var len = response.length;
                //alert(len);
                $(".selectHYPO").empty();
                $(".selectHYPO1").empty();
                for( var i = 0; i<len; i++){
                 // alert(response[i]);
                  //obj = JSON.parse(response[i]);

                    var hypoId = response[i]['hypoId'];
                    var hypoName = response[i]['hypoName'];
                   //var hypoId = obj.hypoId;
                   //var hypoName = obj.hypoName;
                    //alert(hypoName);
                    $(".selectHYPO").append("<option value='"+hypoName+"'>"+hypoName+"</option>");
                    $(".selectHYPO1").append("<option value='"+hypoName+"'>"+hypoName+"</option>");

                }
                
            }
        });
  

   $.ajax({
            url: 'financePayoutMasterOnServer.php',
            method: 'post',
            data: {
              key: 'ddlCustomer'
            },
            dataType: 'json',
            success:function(response){
             // obj = JSON.parse(response);
                var len = response.length;
                //alert(len);
                $(".selectCustId").empty();
                for( var i = 0; i<len; i++){
                 // alert(response[i]);
                  //obj = JSON.parse(response[i]);

                    var custId = response[i]['custId'];
                    var custName = response[i]['custName'];
                   //var custId = obj.custId;
                   //var custName = obj.custName;
                    //alert(custName);
                    $(".selectCustId").append("<option value='"+custId+"'>"+custName+"</option>");

                }
                
            }
        });

  

$("#loanAmount1").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#EMI").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#pFees").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#stampDuty").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#disbusmentAmount").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#financeRate").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#rateOperate").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#payOut").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#BKGAmount").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#perFile").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#totalAmount").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#DPIncentive").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#slabIncentive").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#grandTotal").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
$("#ER").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

$('.selectInvoiceId').select2({
                  placeholder: 'Select Invoice No',
                  dropdownAutoWidth : true,
                  width: '100%'
        });
$('.selectHYPO').select2({
                  placeholder: 'Select Invoice No',
                  dropdownAutoWidth : true,
                  width: '100%'
        });
$('.selectHYPO1').select2({
                  placeholder: 'Select Invoice No',
                  dropdownAutoWidth : true,
                  width: '100%'
        });
$('.selectCustId').select2({
                  placeholder: 'Select Customer Name',
                  dropdownAutoWidth : true,
                  width: '100%'
        });
$('.selectCustId').on('select2:select', function (e) {         
        var id = $('.selectCustId').val();
        $('#custId').val(id);
       

        fillInvoice(id);

        
      });
  

$('.selectInvoiceId').on('select2:select', function (e) {         
        var id = $('.selectInvoiceId').val();
        //alert(id);
        editInvoiceData(1,'EditInvoice',id);

        $('#btnRefreshVehicle').trigger('click');
      });
  
});

$('#btnInvoiceRefresh').on('click',function(){
  if($('#invoiceId').val()==''){
    alert('Invoice Not Selected');
    return;
  }
  var id = $('.selectInvoiceId').val();
        //alert(id);
        editInvoiceData(1,'EditInvoice',id);

        $('#btnRefreshVehicle').trigger('click');
 });

function fillInvoice(custId)
{
  $.ajax({
            url: 'financePayoutMasterOnServer.php',
            method: 'post',
            data: {
              key: 'ddlInvoiceId',
              custId : custId
            },
            dataType: 'json',
            success:function(response){
             // obj = JSON.parse(response);
                var len = response.length;
                //alert(len);
                $(".selectInvoiceId").empty();
                for( var i = 0; i<len; i++){
                 // alert(response[i]);
                  //obj = JSON.parse(response[i]);

                    var invoiceId = response[i]['invoiceId'];
                    var invoiceNo = response[i]['invoiceNo'];
                   //var invoiceId = obj.invoiceId;
                   //var invoiceNo = obj.invoiceNo;
                    //alert(invoiceNo);
                    $(".selectInvoiceId").append("<option value='"+invoiceId+"'>"+invoiceNo+"</option>");

                }
                
            }
        });

}
$('#btnRefreshVehicle').on('click',function(){
  alert('Updating VehicleDetails');
  if($('#vehicleId').val()==''){
    alert('Invoice Not Selected');
    return;
  }
  
  var id = $('#vehicleId').val();
  $.ajax({
          url: "financePayoutMasterOnServer.php", 
          method: "post",
          datatype: "json",
          data :{
            key: 'vehicleDetails',
            id: id
          },success: function(response){
           // alert(response);
            obj = JSON.parse(response);
            $("#vehicleDetails").val(obj.productModel+' '+obj.productVariant );           
                        
          }
        });
});
function editInvoiceData(status,key,id)
{
  //alert(id);
    $.ajax({
          url: "financePayoutMasterOnServer.php", 
          method: "post",
          datatype: "json",
          data :{
            key: key,
            id: id
          },success: function(response){
           // alert(response);
            obj = JSON.parse(response);
            $("#invoiceId").val(obj.invoiceId);
            $('#custId').val(obj.custId);
            $('#companyId').val(obj.companyId);
            $('#vehicleId').val(obj.vehicleId);            
            $('#executiveName').val(obj.executiveName);
            $('#hypoId').val(obj.hypoId).trigger('change');                        
            $('#hypoId1').val(obj.hypoId).trigger('change');                        
            $('#loanAmount').val(obj.loanAmount);
            $('#loanAmount1').val(obj.loanAmount);
                        
          }
        });
}
function deleteData(status,key,id)
{
  if(status==1)
  {
    var conf= confirm("are you sure want to Delete");
  }
  else
  {
    var conf= confirm("are you sure want to UnDelete"); 
  }
    if(conf)
    {
      $.ajax({
        url: "financePayoutMasterOnServer.php",
        method: "post",
        datatype: "text",
        data: {
          key: key,
          id: id,
          status: status
        },
        success: function(response)
        {
            $('.message').html(response);
        }
      });  
      $('tbody').empty();
     // viewData('View',0,10);
    }
    else
    {
      $('.message').html('Delete Canceled');
    }
    
}
function updateInvoiceData(key,id,loanAmount,hypoId)
{
  $.ajax({
          url: "financePayoutMasterOnServer.php", 
          method: "post",
          datatype: "text",
          data :{
            key: key,
            id: id,            
            hypoId: hypoId,
            loanAmount: loanAmount
          },success: function(response){
            
            if($.trim(response)=='1 Record Updated'){                
                alert('Hypo Updated');
                $('#btnInvoiceRefresh').trigger('click');
          }else{
            alert("Error while updating Hypo Please Try After some Time ...!");
          }
        }
        });
}
function updateData(key,id){
      
      var invoiceId = $('#invoiceId');
      var EMI = $('#EMI');
      var pFees = $('#pFees');
      var stampDuty = $('#stampDuty');
      var disbusmentAmount = $('#disbusmentAmount');
      var financeRate = $('#financeRate');
      var rateOperate = $('#rateOperate');
      var payOut = $('#payOut');
      var BKGAmount = $('#BKGAmount');
      var perFile = $('#perFile');
      var totalAmount = $('#totalAmount');
      var DPIncentive = $('#DPIncentive');
      var slabIncentive = $('#slabIncentive');
      var grandTotal = $('#grandTotal');
      //var executiveName = $('#executiveName');
      var ER = $('#ER');
      var companyId =$('#companyId').val();

     // alert(invoiceId.val());
      if(isNotEmpty(invoiceId) && 
        isNotEmpty(EMI) && 
        isNotEmpty(pFees) && 
        isNotEmpty(stampDuty) && 
        isNotEmpty(disbusmentAmount) && 
        isNotEmpty(financeRate)&& 
        isNotEmpty(rateOperate)&& 
        isNotEmpty(payOut) && 
        isNotEmpty(BKGAmount)&& 
        isNotEmpty(totalAmount)&& 
        isNotEmpty(DPIncentive)&& 
        isNotEmpty(slabIncentive)&& 
        isNotEmpty(grandTotal)&& 
       // isNotEmpty(executiveName)&& 
        isNotEmpty(ER))
      {
        $.ajax({
          url: "financePayoutMasterOnServer.php", 
          method: "post",
          datatype: "text",
          data :{
            key: key,
            id: id,
            invoiceId: invoiceId.val(),
            EMI: EMI.val(),
            pFees: pFees.val(),
            stampDuty: stampDuty.val(),
            disbusmentAmount: disbusmentAmount.val(),
            financeRate: financeRate.val(),
            rateOperate: rateOperate.val(),
            payOut: payOut.val(),
            BKGAmount: BKGAmount.val(),
            perFile: perFile.val(),
            totalAmount: totalAmount.val(),
            DPIncentive: DPIncentive.val(),
            slabIncentive: slabIncentive.val(),
            grandTotal: grandTotal.val(),
            //executiveName: executiveName.val(),
            ER: ER.val(),
            companyId: companyId
          },success: function(response){
            
            if($.trim(response)=='1 Record Updated'){
                $("#btnSave").html('Save');
                doEmptyText();
                $('.message').html("1 Record Updated");
              $('#InvoiceDetails').show();  
            }else
            {
              $('.message').html(response);
            }
          }
        });

      }
}


function editData(status,key,id)
{

    $.ajax({
          url: "financePayoutMasterOnServer.php", 
          method: "post",
          datatype: "json",
          data :{
            key: key,
            id:id
          },success: function(response){
            
            obj = JSON.parse(response);
            if($.trim(status)=='1')
            {
              //alert($.trim(response));
              //obj = JSON.parse(response);
              //alert(obj.BKGAmount);
              $("#rowId").val(obj.financePayoutId);
              $("#invoiceId").val(obj.invoiceId);
              $("#EMI").val(obj.EMI);
              $("#pFees").val(obj.pFees);
              $("#stampDuty").val(obj.stampDuty);
              $("#disbusmentAmount").val(obj.disbusmentAmount);
              $("#financeRate").val(obj.financeRate);
              $("#rateOperate").val(obj.rateOperate);
              $("#payOut").val(obj.payOut);
              $("#BKGAmount").val(obj.BKGAmount);
              $("#perFile").val(obj.perFile);
              $("#totalAmount").val(obj.totalAmount);
              $("#DPIncentive").val(obj.DPIncentive);
              $("#slabIncentive").val(obj.slabIncentive);
              $("#grandTotal").val(obj.grandTotal);
              //$("#executiveName").val(obj.executiveName);
              $("#ER").val(obj.ER);
              
              //$("#btnSave").val('Save Change');
              $("#btnSave").html('Save Change');
              $('.message').html("Click Save change After Editing");
              $('#InvoiceDetails').hide();
              //editInvoiceData(1,'EditInvoice',obj.invoiceId);
            }
            else
            {
              //obj = JSON.parse(response);
              $('#viewRecordLabel').html(obj.invoiceId);
              $('#viewRecord').modal('show');
              var view= "Chassis No :" + obj.invoiceId +"<br> EMI :-" + obj.EMI + "<br> Process Fees :-"  + obj.pFees+ "<br> Model:- " + obj.stampDuty + "<br> Disbusment Amount:- " + obj.disbusmentAmount + "<br> Finance Rate:- " + obj.financeRate + "<br> Payout:- " + obj.payOut + "<br> BKG Amount:- " + obj.BKGAmount ;
              $('#viewContent').html(view);
            }
          }
        });
}
    
    function isNotEmpty(text){
      if(text.val()=='')
      {
        text.css('border','1px solid red');
        text.focus();
        $('.message').html('Please Fill All Details');
        return false;
      }
      else
      {
        text.css('border','');
        return true;
      }

    }
    function doEmptyText(){
      var invoiceId = $('#invoiceId');
      var EMI = $('#EMI');
      var pFees = $('#pFees');
      var stampDuty = $('#stampDuty');
      var disbusmentAmount = $('#disbusmentAmount');
      var financeRate = $('#financeRate');
      var rateOperate = $('#rateOperate');
      var payOut = $('#payOut');
      var perFile = $('#perFile');
      var BKGAmount = $('#BKGAmount');      
      var totalAmount = $('#totalAmount');
      var DPIncentive = $('#DPIncentive');
      var slabIncentive = $('#slabIncentive');
      var grandTotal = $('#grandTotal');
      //var executiveName = $('#executiveName');
      var ER = $('#ER');
      
      
      invoiceId.val('');      
      EMI.val('');
      pFees.val('');
      stampDuty.val('');
      disbusmentAmount.val('');
      financeRate.val('');
      rateOperate.val('');
      payOut.val('');
      perFile.val('');
      BKGAmount.val('');
      totalAmount.val('');
      DPIncentive.val('');
      slabIncentive.val('');
      grandTotal.val('');
      //executiveName.val('');
      ER.val('');
      
    }
function manageData(key)
    {
      //alert(key);
      //alert($('#invoiceId').val());
      var invoiceId = $('#invoiceId');
      var EMI = $('#EMI');
      var pFees = $('#pFees');
      var stampDuty = $('#stampDuty');
      var disbusmentAmount = $('#disbusmentAmount');
      var financeRate = $('#financeRate');
      var rateOperate = $('#rateOperate');
      var payOut = $('#payOut');      
      var BKGAmount = $('#BKGAmount');
      var perFile = $('#perFile');
      var totalAmount = $('#totalAmount');
      var DPIncentive = $('#DPIncentive');
      var slabIncentive = $('#slabIncentive');
      var grandTotal = $('#grandTotal');
      //var executiveName = $('#executiveName');
      var ER = $('#ER');
      var companyId =$('#companyId').val();
     // alert(invoiceId.val());
      if(isNotEmpty(invoiceId) && 
        isNotEmpty(EMI) && 
        isNotEmpty(pFees) && 
        isNotEmpty(stampDuty) && 
        isNotEmpty(disbusmentAmount) && 
        isNotEmpty(financeRate)&& 
        isNotEmpty(rateOperate)&& 
        isNotEmpty(payOut) && 
        isNotEmpty(BKGAmount)&& 
        isNotEmpty(totalAmount)&& 
        isNotEmpty(DPIncentive)&& 
        isNotEmpty(slabIncentive)&& 
        isNotEmpty(grandTotal)&& 
        //isNotEmpty(executiveName)&& 
        isNotEmpty(ER))
      {
        $.ajax({
          url: "financePayoutMasterOnServer.php", 
          method: "post",
          datatype: "text",
          data :{
            key: key,
            invoiceId: invoiceId.val(),
            EMI: EMI.val(),
            pFees: pFees.val(),
            stampDuty: stampDuty.val(),
            disbusmentAmount: disbusmentAmount.val(),
            financeRate: financeRate.val(),
            rateOperate: rateOperate.val(),
            payOut: payOut.val(),
            BKGAmount: BKGAmount.val(),
            perFile: perFile.val(),
            totalAmount: totalAmount.val(),
            DPIncentive: DPIncentive.val(),
            slabIncentive: slabIncentive.val(),
            grandTotal: grandTotal.val(),
            //executiveName: executiveName.val(),
            ER: ER.val(),
            companyId: companyId
          },success: function(response){
            //alert(response);
            if($.trim(response)=='1 Record Inserted')
            {
                doEmptyText();
                $('.message').html(response);
            }
            else
            {
              alert('Not Inserted');
              $('.message').html(response);
            }
          }
        });

      }
      
    }

    function viewData(key,start,limit){
      $('.message').html('Data Loading Please Wait');
     // $('#loadingmessage').show(); 
      //alert("viewData");
        $.ajax({
          url: "financePayoutMasterOnServer.php", 
          method: "post",
          datatype: "text",
          data :{
            key: key,
            start: start,
            limit: limit
            
          },success: function(response){
            //alert(response);
            if($.trim(response)!== "ReachedMax"){
                $('tbody').append(response);
                start += limit;
                viewData('View',start,limit);
            }
            else
            {
              $('table').DataTable();
              $('.message').html('Data Loaded');
             // $('#loadingmessage').hide();
              //{
                //  "scrollY": 400,
                   //"scrollX": true
                //});
            }
            

          }
        });
    }
</script>
</body>
</html>
