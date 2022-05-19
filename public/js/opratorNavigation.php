<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img class="navbar-img" src="img/EquityLogoMain.jpg"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-book"></i>Masters
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="vehicleMaster.php"><i class="fa fa-car">Vehicle Master</a>
          <a class="dropdown-item" href="hypoMaster.php">Hypo Master</a>
          <a class="dropdown-item" href="insurenceMaster.php">Insurence Master</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa fa-flash"></i>  Transection
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="customerSalesInvoice.php">Customer Sales Invoice</a>
          <a class="dropdown-item" href="editCustomerSalesInvoice.php">Edit Customer Sales Invoice</a>
          <a class="dropdown-item" href="uploadSalesDocuments.php">Upload Sales Documents</a>          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="customerServiceInvoice.php">Customer Service Invoice</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reports
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="RTOCalculationReport.php">RTO Calculation Report</a>
          <a class="dropdown-item" href="RMCCalculation.php">RMC Calculation Report</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="customerServiceInvoice.php">Customer Service Invoice</a>
        </div>
      </li>
      
      
      
      </ul>
      <ul class="navbar-nav pull-right">      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="img\user-logo-small.png" class="img-responsive"> <?php if(isset($_SESSION['userName']))
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