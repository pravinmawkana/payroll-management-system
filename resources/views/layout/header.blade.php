	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="index.php">
					<img src="{{ asset('vendors/images/deskapp-logo.png') }}" alt="" class="mobile-logo">
				</a>
			</div>

			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>

			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
						<span class="user-name">
							{{ session('userName') ??  'Guest' }}

						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.php"><i class="fa fa-user-md" aria-hidden="true"></i> Profile</a>
						<a class="dropdown-item" href="changePassword.php"><i class="fa fa-cog" aria-hidden="true"></i> Change Passowrd</a>
						<a class="dropdown-item" href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
						<a class="dropdown-item" href="{{ url('login') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
			<div id="mainNotification" class="bg-danger"></div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="fa fa-bell" aria-hidden="true"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul class="notify">
								<li>
									<a href="#">
										<img src="{{ asset('img/user-logo-small.png')}}" alt="">
										<h3 class="clearfix"><small>Pravin Makwana <span>3 mins ago</span></small></h3>
										<p><small>Verify your last login details for security reason..you can also change your password</small></p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="{{ asset('img/user-logo-small.png')}}" alt="">
										<h3 class="clearfix"><small>Pravin Makwana <span>3 mins ago</span></small></h3>
										<p><small>You can use help option from your profile menu</small></p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id='loadingmessage' style='display:none'>
  <img src='{{ asset('img/loading_spinner.gif') }}'/><br>
  Loading, please wait...
</div>
<div id='countdonw' style='display:none'>
	<img src='{{ asset('img/loading_spinner.gif') }}'/><br>
  <div id="some_div"></div>
  Logout, you are Inactive...
</div>
	 <style>
  #loadingmessage,#countdonw {

     position: fixed;
     left: 50%;
     top: 50%;
     background-color:#666;
	 opacity : 1;
     background-repeat: no-repeat;
     background-position: center;
     margin: -100px 0 0 -100px;
     background-color: #fefefe;
     z-index: 10000000;

 }
  </style>
