<?php 
	session_start();
	
	if(isset($_SESSION['Distributor'])){
		echo '<script>location.href="../Distributor/";</script>';
	}
	
	if(isset($_SESSION['Player'])){
		echo '<script>location.href="../Player/";</script>';
	}
	
	if(isset($_SESSION['Developer'])){
		echo '<script>location.href="../Developer/";</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Save Me</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="signingin.php" method="GET" id="login_form">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="usernametxt" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="passwordtxt" required="" />
              </div>
              <div>
               <!-- <a class="btn btn-default submit">Log in</a> -->
               
               <?php
               if(isset($_GET['attempt'])){
                echo '<p style="color: red;">Wrong Credentials</p>';
               }
               ?>
               
			  <div>
                <button class="btn btn-default submit">Submit</button>
              </div>
                <a class="reset_pass" href="#sign">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img style="width:30px;height:35px;" src="images/LogoGrayscale.png"> Welcome to Save Me!</h1>
                  <p>©2019 All Rights Reserved - Project Save Me. Alternative payment method for in-app purchases.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="GET" action="signup.php" id="signup_form">
              <h1>Create Account</h1>
              <div>
                <input name="usernametxtup" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input name="emailtxtup" type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input name="passwordtxtup" type="password" class="form-control" placeholder="Password" required="" />
              </div>
			  <!--<div>
                <input name="birthdaytxt" id="datepicker" type="date" class="form-control" placeholder="Birthday" required="" />
              </div>-->
			  <div>
				<input type="hidden" id="regDatetxt" name="regDate"/>
			  </div>
			  <div>
				<input type="hidden" id="countrytxt" name="country"/>
			  </div>
			  
			   <div>
                <button class="btn btn-default submit">Submit</button>
              </div>
			  
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img style="width:30px;height:35px;" src="images/LogoGrayscale.png"> Welcome to Save Me!</h1>
                  <p>©2019 All Rights Reserved - Project Save Me. Alternative payment method for in-app purchases.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//js.maxmind.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>
  <script>
	var country = document.getElementById('countrytxt');
	  $.get("http://ipinfo.io", function(response) {
		  country.value = response.country;
	}, "jsonp");
  </script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  <script>
	var item = document.getElementById('regDatetxt');
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd='0'+dd
	} 

	if(mm<10) {
		mm='0'+mm
	} 

	today = mm+'/'+dd+'/'+yyyy;
	item.value=today;
  </script>
</html>
