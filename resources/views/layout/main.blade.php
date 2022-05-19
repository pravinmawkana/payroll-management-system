<!DOCTYPE html>
<html>
<head>
  @stack('title')
 @include('layout.head')
</head>
<body>
	 @include('layout.header')
  @include('layout.sidebar')
	 <div class="main-container">
         <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">@yield('page-name') </li>
    </ol>
  </nav>

			 @yield('main-content')
			 @include('layout.footer')

	 </div>
	 @include('layout.script')
     @yield('script')
     <button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
	<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
	<style>

@media only screen and (max-width: 600px) {
  .brand-logo a img {
  max-width: 100px;
  display: block;
  margin: 0 auto; }
 p{
 	font-size: 9px;
 }
 #noti_user{
 	font-size: 15px;
 }
 #noti_user span{
 	font-size: 7px;
 }
}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: rgba(250,0,0,0.5);
  color: white;
  cursor: pointer;
  padding: 5px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
</style>
<script type="text/javascript">
	var stor = 0;
	var timeLeft = 600000;
	var elem = document.getElementById('some_div');
	var timerId =0;
	if (typeof(Storage) !== "undefined") {
		stor =1;


    } else {
    // No web storage Support.
    stor = 0;
}
document.body.addEventListener("mousemove", function(event) {
if(stor==1){
		var currentTime = Date.now();

  		//console.log('LastAccessTime '+currentTime);
	    window.localStorage.setItem('LastAccessTime', currentTime);
	    $('#countdonw').hide();
	    timeLeft= 600000;
	}
});

    function countdown() {
      if (timeLeft == -1) {
        clearTimeout(timerId);
        doSomething();
      } else {
        elem.innerHTML = timeLeft + ' seconds remaining';
        timeLeft--;
      }
    }
 function doSomething(){
 	window.location.replace("login");
 }
function refreshData(){
	var LastAccessTime = window.localStorage.getItem('LastAccessTime');
var totalTime = Math.abs(Date.now() - LastAccessTime);
	//console.log("diff "+totalTime);
	//console.log("check"+2*60*60*1000)
	/*if(totalTime>30000){
		$('#countdonw').val("logOut in 30 Seconds");
		$('#countdonw').show();
	}*/
    if( totalTime > 600000 ) {
    //console.log("sufficient time"+ totalTime);
    //alert("log Out");
    timeLeft = 30;

    $('#countdonw').show();
    timerId =setInterval(countdown, 1000);




    //header("")
  }
  else {
    //console.log("Less time"+ totalTime);

  }
}setInterval(refreshData, 60000);
function myFunction(){

		var value = $("#search-menu").val().toLowerCase();

    $("#mainMenu ul").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
    if(value=="")
		$('#mainMenu ul').fadeOut();
}
/*$("#search-menu").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#submenu ul").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });*/
</script>

</body>
</html>
