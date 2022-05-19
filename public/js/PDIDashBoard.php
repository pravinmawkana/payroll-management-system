<?php
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

  <title>PDI Dashboard -Equity Hyuindai,Rajkot</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <!-- Awesome fone css  -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!-- Toastr css  -->
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  </head>

<body>
  
<div class="container-fluid">



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
    if ($_SESSION['userRigts']=="PDI")
    {
      include_once("PDINavigation.php");
    }
  }
  else
  {
    include_once("navigation.php");
  }
 ?>
<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"> Dashboard <?php if(isset($_SESSION['userName']))
                { 
                  echo $_SESSION['userName'];
                }
                else
                {
                  echo "Guest";
                  header('Location: index.php');
                  }?></h3>
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>
  </div>
</div>
<div class="row">
  <div class="table-responsive-md">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>vehicleLocation</th>
          <th>Total</th>
        <!--  <th>Engin No</th>
          <th>Key No</th>
          <th>Model</th>
          <th>Veriant</th> 
          <th>Color</th>
          <th>HMILInvoiceDate</th>
          <th>ReceivedDate</th>
           -->
          
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
</div>

</div>
    

  

    <!-- Optional JavaScript 
    <script src="js/myscript.js"></script> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/toastr.min.js"></script>
  </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
  viewVehicleStock('loadStock');

  //alert('ready');

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
});

function viewVehicleStock(key){
  //alert('load');
$.ajax({
          url: "vehicleLocationWiseStockOnServer.php", 
          method: "post",
          datatype: "text",
          data :{
            key: key
            
          },success: function(response){
            //alert(response);
            
                $('tbody').append(response);                

            }
        });
}
</script>

