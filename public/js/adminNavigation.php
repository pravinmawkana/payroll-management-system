<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img class="navbar-img" src="img/EquityLogoMain.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fa fa-home"></i>Home <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-book"></i> Masters
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customerMaster.php"><i class="fa fa-child"></i>Customer Master</a>          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="vehicleMaster.php"><i class="fa fa-car"></i>Vehicle Master</a>
          <a class="dropdown-item" href="vehiclePDIEntry.php"><i class="fa fa-car">Vehicle PDI Entry</a>
          <a class="dropdown-item" href="vehicleLocationEntry.php"><i class="fa fa-car">Vehicle Location Entery</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="hypoMaster.php">Hypo Master</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="insurenceMaster.php">Insurence Master</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa fa-flash"></i> Transection
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customerSalesInvoice.php">Customer Sales Invoice</a>
          <a class="dropdown-item" href="editCustomerSalesInvoice.php">Edit Customer Sales Invoice</a>
          <a class="dropdown-item" href="hideShowSalesInvoice.php">Hide Customer Sales Invoice</a>          
          <a class="dropdown-item" href="financePayoutMaster.php">Finance Payout Master</a>          
          <a class="dropdown-item" href="uploadSalesDocuments.php">Upload Sales Documents</a>          
          <div class="dropdown-divider"></div>          
          <a class="dropdown-item" href="customerServiceInvoice.php">Customer Service Invoice</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa fa-flash"></i> Report
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="RTOCalculationReport.php">RTO Calculation Report</a>
          <a class="dropdown-item" href="RMCCalculation.php">RMC Calculation Report</a>
          <a class="dropdown-item" href="HSRPReport.php">HSRP Report</a>
          <a class="dropdown-item" href="custSalesReport.php">Sales Report</a>
          <a class="dropdown-item" href="custInvoiceReport.php">Custom Sales Report</a>
          <div class="dropdown-divider"></div>          
          <a class="dropdown-item" href="customerServiceInvoice.php">Customer Service Invoice</a>
        </div>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-upload"></i>Upload
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="uploadCustomerExcel.php"><i class="fa fa-child"></i>Customer Details</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="vehicleMasterUsingExcelUpload.php"><i class="fa fa-car"></i>Vehicle Details</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="vehicleLocation.php">Vehicle Location Upload</a>
          <a class="dropdown-item" href="uploadPDIData.php">Vehicle PDI Data</a>          
        </div>
      </li>
      
      
      </ul>
      <ul class="navbar-nav pull-right">
      <li class='nav-item'>
        <a class='nav-link' href='registerEmployee.php'><i class="fa fa-user-plus"></i>Register User</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle-o"></i>   <?php if(isset($_SESSION['userName']))
                { 
                  echo $_SESSION['userName'];
                }
                else
                {
                  echo "User Name";
                  
                  }?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Change Passowrd</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logOut.php">Log Out</a>
        </div>
      </li>
      
      
    </ul>
    
  </div>
</nav>