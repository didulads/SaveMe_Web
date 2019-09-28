<?php 
	session_start();
	if(!isset($_SESSION['user'])){
		echo '<script>alert("sessions defined");</script>';
		header("location: index.php");
	}
	include 'connection.php';
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
              <h1>Select Your Account</h1>
			  
			  <div>
			  <a href="javascript:void(0)">
				<img style="width:100px;height:100px;" src="images/player.png"  onclick="trigger(1);"> 
				<p onclick="trigger(1);">Player</p>
			  </a>	
			  </div>
			  <br>
			  <div>
			  <a href="javascript:void(0)">
				<img style="width:100px;height:100px;" src="images/manufacturer.png" onclick="trigger(2);"> 
				<p onclick="trigger(2);">Distributor</p>
			  </a>
			  </div>
			  <br>
			  <div>
			  <a href="javascript:void(0)">
				<img style="width:100px;height:100px;" src="images/developer.png" onclick="trigger(3);"> 
				<p onclick="trigger(3);">Developer</p>
			  </a>
			  </div>
			  
			  <div class="separator">
                <div>
                  <p>©2019 All Rights Reserved - Project Save Me. Alternative payment method for in-app purchases.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

		
        <div id="register" class="animate form registration_form">
          <section class="login_content">
		  <div id="developerdetail" style="display:none;margin-left:auto;margin-right:auto;vertical-align:middle;">
			<form id="developer_form" method="GET" action="developersignup.php">
			  <h1>Developer</h1>
			  <div style="margin-left:auto;margin-right:auto;vertical-align:middle;">
				<img style="width:100px;height:100px;" src="images/developer.png"> 
				<br><br><br>
				<input type="text" class="form-control" name="devid" value="<?php 
							$queryp = "SELECT * FROM developer";
							$resultp = mysqli_query($conn,$queryp);
							if(mysqli_num_rows($resultp)<9){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'DEV_000'.$rowcount;
							echo 'DEV_000'.$rowcount;}
							else if(mysqli_num_rows($resultp)<99){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'DEV_00'.$rowcount;
							echo 'DEV_00'.$rowcount;}
							else if(mysqli_num_rows($resultp)<999){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'DEV_0'.$rowcount;
							echo 'DEV_0'.$rowcount;}
							else{
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'DEV_'.$rowcount;
							echo 'DEV_'.$rowcount;}
					?>" readonly/>
				<div>
					<input name="nicknametxtup" type="text" class="form-control" placeholder="Nickname" required="" />
				</div>
				<div>
					<input name="accountup" type="number" class="form-control" placeholder="Account Number" required="" />
				</div>
				<br></br>
				<div>
					<select name="devtype" class="form-control">
						<option value="indie">Indie</option>
						<option value="company">Company</option>
					</select>
				</div>
				<div>
					<a class="btn btn-default submit" href="javascript:{}" onclick="document.getElementById('developer_form').submit();">Create Account</a>
				</div>
			  </div>
			  <div class="clearfix"></div>

              <div class="separator">
                  <a href="#signin" class="to_register"> Back </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img style="width:30px;height:35px;" src="images/LogoGrayscale.png"> Welcome to Save Me!</h1>
                  <p>©2019 All Rights Reserved - Project Save Me. Alternative payment method for in-app purchases.</p>
                </div>
              </div>
            </form>
			</div>

			<div id="gamerdetail" style="display:none;">
			<form id="gamer_form" method="GET" action="gamersignup.php">
			  <h1>Player</h1>
			  <div style="margin-left:auto;margin-right:auto;vertical-align:middle;">
				<img style="width:100px;height:100px;" src="images/player.png"> 
				<br><br><br>
				<div>
					<label><?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}else{echo "Error Occured";} ?></label>
					<h3><?php 
							$queryp = "SELECT * FROM player";
							$resultp = mysqli_query($conn,$queryp);
							if(mysqli_num_rows($resultp)<9){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'PL_000'.$rowcount;
							echo 'PL_000'.$rowcount;}
							else if(mysqli_num_rows($resultp)<99){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'PL_00'.$rowcount;
							echo 'PL_00'.$rowcount;}
							else if(mysqli_num_rows($resultp)<999){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'PL_0'.$rowcount;
							echo 'PL_0'.$rowcount;}
							else{
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'PL_'.$rowcount;
							echo 'PL_'.$rowcount;}
					?></h3>
					<input type="hidden" name="playerid" value="<?php echo $val; ?>"/>
					<label>This will be your player ID and you will need this to get your coins.</label>
				</div>
				<div>
					<a class="btn btn-default submit" href="javascript:{}" onclick="document.getElementById('gamer_form').submit();">Proceed</a>
				</div>
			  </div>
			  <div class="clearfix"></div>

              <div class="separator">
                  <a href="#signin" class="to_register"> Back </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img style="width:30px;height:35px;" src="images/LogoGrayscale.png"> Welcome to Save Me!</h1>
                  <p>©2019 All Rights Reserved - Project Save Me. Alternative payment method for in-app purchases.</p>
                </div>
              </div>
            </form>
			</div>

			<div id="manufacturerdetail" style="display:none;margin-left:auto;margin-right:auto;vertical-align:middle;">
			<form id="manufacturer_form" method="GET" action="distributorsignup.php">
			  <h1>Distributor</h1>
			  <div style="margin-left:auto;margin-right:auto;vertical-align:middle;">
				<img style="width:100px;height:100px;" src="images/manufacturer.png"> 
				<br><br><br>
				<div>
					<input name="CreditCardNumbertxtup" type="number" class="form-control" placeholder="Credit Card Number" required="" />
				</div>
				<br>
				<div>
					<input name="Pintxtup" type="number" class="form-control" placeholder="PIN number" maxlength="3" required="" />
				</div>
				<br>
				<div>
					<input name="ContactNumbertxtup" type="number" class="form-control" placeholder="Contact Number" required="" />
				</div>
				<input type="hidden" name="orgid" value="<?php 
							$queryp = "SELECT * FROM organization";
							$resultp = mysqli_query($conn,$queryp);
							if(mysqli_num_rows($resultp)<9){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'ORG_000'.$rowcount;
							echo 'ORG_000'.$rowcount;}
							else if(mysqli_num_rows($resultp)<99){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'ORG_00'.$rowcount;
							echo 'ORG_00'.$rowcount;}
							else if(mysqli_num_rows($resultp)<999){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'ORG_0'.$rowcount;
							echo 'ORG_0'.$rowcount;}
							else{
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'ORG_'.$rowcount;
							echo 'ORG_'.$rowcount;}
					?>" />
				
				<div>
					<a class="btn btn-default submit" href="javascript:{}" onclick="document.getElementById('manufacturer_form').submit();">Create Account</a>
				</div>
			  </div>
			  <div class="clearfix"></div>

              <div class="separator">
                  <a href="#signin" class="to_register"> Back </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img style="width:30px;height:35px;" src="images/LogoGrayscale.png"> Welcome to Save Me!</h1>
                  <p>©2019 All Rights Reserved - Project Save Me. Alternative payment method for in-app purchases.</p>
                </div>
              </div>
            </form>
			</div>
			</section>
        </div>
          
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		function trigger(section){
			
			var gamerform = document.getElementById("gamerdetail");
			var developerform = document.getElementById("developerdetail");
			var manufacturerform = document.getElementById("manufacturerdetail");
			if(section==1){
				//player
				gamerform.style.display = 'block';
				developerform.style.display = 'none';
				manufacturerform.style.display = 'none';
			}
			if(section==2){
				//distributor
				gamerform.style.display = 'none';
				developerform.style.display = 'none';
				manufacturerform.style.display = 'block';
			}
			if(section==3){
				//developer
				gamerform.style.display = 'none';
				developerform.style.display = 'block';
				manufacturerform.style.display = 'none';
			}
			window.location = "./usertype.php#signup";
		}
	</script>
</html>
