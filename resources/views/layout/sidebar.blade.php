
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="vendors/images/deskapp-logo.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<div class="chat-search">
                  <span class="ti-search"></span>
                  <input id="search-menu" onkeyup="myFunction()" type="text" placeholder="Search Menu">
                </div>
				<ul id="accordion-menu">
					<div id="mainMenu">
				{{-- @if(isset(session('userid'))) --}}
								{{-- {{ session('userid')?? 'Guest' }}				 --}}
					{{-- @else
						{{ "Guest" }}
				@endif --}}

 		@php

    echo App\Http\Controllers\DisplaySidebarController::index();
   @endphp




					<div>
				</ul>
			</div>
		</div>
	</div>

<?php
