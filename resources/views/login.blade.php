<!DOCTYPE html>
<html>
<head>
  <title>Login </title>
 @include('layout.head')
</head>
<body>

     <div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
    <div class="login-box bg-white box-shadow pd-30 border-radius-5">
      <img src="vendors/images/login-img.png" alt="login" class="login-img">
      <h2 class="text-center mb-30">Equity Hyundai Login</h2>
      <form>
        @csrf
        <div class="input-group custom input-group-lg">         
          <input type="text" id="userName" class="form-control" placeholder="Username">
          <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
          </div>
        </div>
        <div class="input-group custom input-group-lg">
          <input type="password" id="userPassword" class="form-control" placeholder="**********">
          <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
          </div>
          <input type="hidden" class="form-control" id="securityCode" value=''>
        </div>
        <div class="input-group custom input-group-lg">
          <input type="password" id="userPassword1" class="form-control" placeholder="**********">
          <div class="input-group-append custom">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
          </div>
          
        </div>
        <div class="form-check">
            <input type="checkbox" class="js-switch" id="rememberMe">
            <label class="form-check-label js-switch" for="exampleCheck1">Remember Me<i class="fa fa-calendar-check-o"></i></label>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="input-group">
              <!--
                use code for form submit
                <input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
              -->
              <button id="logIn" type="button" class="btn btn-outline-primary btn-lg btn-block"><i class="fa fa-lock"></i>
                Log In</button>
              
            </div>
          </div>
          <div class="col-sm-6">
            <div class="forgot-password padding-top-10"><a href="#"></i>Forgot Password</a></div>
          </div>
        </div>
        <p id="message">log Off</p>
      </form>
    </div>
  </div>
	 @include('layout.script')
   <script>
        var input = document.getElementById("userPassword1");
        input.addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("logIn").click();
                //document.getElementById('userPassword1').set
                //alert('enter');
                            }
        });
      </script>
      <script type="text/javascript">
      
        $('#logIn').on('click', function(){
          var token = $('input[name="_token"').val();
          var userName = $('#userName').val();
              var userPassword = $('#userPassword').val();
              var userPassword1 = $('#userPassword1').val();
              
                //$('#logIn').html("Done");
                
                if(userName=='' || userPassword=='')
                {
                  alert("userName and Password are required");
                }
                else
                {
                    $.ajax(
                    {
                      url: '{{ route("login") }}',
                      method : 'POST',
                      data: {
                        _token: token,
                        logIn: 1,
                        userName : userName,
                        userPassword: userPassword,
                        userPassword1: userPassword1
                        
                      },
                      success: function(response){
                        //alert(response);
                        $('#message').html(response);
                        if(response.status==400)
                        {
                          
                          $('#message').html('Both Password should be save');
                          return;
                        }
                        
                        if($.trim(response) !="Incorrect username/password"){
                         
                          window.location.replace("dashboard");
                          if(response=="changepassword"){
                            alert("Your Password Is Expired Please change password!");
                           // window.location.replace("changePassword.php");
                          }
                        
                        }
                        
                        
                      },
                      datatype: 'json'

                    });
                }
               
            });
        
      </script>
</body>
</html>