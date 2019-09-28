<?php 
	session_start();
	include 'connection.php';
	if(!isset($_SESSION['Distributor'])){
		echo '<script>alert("sessions not defined</script>");';
		echo '<script> location.href = "../production/login.php";</script>';
	}
	$username = $_SESSION['Distributor'];
	$userq = "SELECT * FROM organization INNER JOIN user ON organization.userId = user.userId WHERE user.userName = '$username';";
	$res = mysqli_query($conn,$userq);
	$row = mysqli_fetch_assoc($res);
	$orgID = $row['Organization_ID'];
	$coins = $row['CoinBalance'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Save Me</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
	<!--SweetAlert-->
	<link rel="stylesheet" type="text/css" href="../production/css/sweetalert.css">
	
	<!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;background:#1ABB9C;">
              <a href="index.html" class="site_title"><img style="width:40px;height:40px;" src="images/LogoBW.png"></i> <span>Save Me</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['Distributor'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Distributor</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-circle-o-notch"></i> Coins Available</a>
                  </li>
                  <li><a href="packages.php"><i class="fa fa-ticket"></i> Packages</a>
                  </li>
                  <li><a href="offer.php"><i class="fa fa-unlock"></i> Offer</a>
                  </li>
                  
                  <li><a><i class="fa fa-bar-chart-o"></i> Statistics <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="reports1.php">Predefined Reports</a></li>
                      <li><a href="reports2.php">Custom Reports</a></li>
                    </ul>
                  </li>
				  
				  <li><a><i class="fa fa-table"></i> Log <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="logpurchase.php">Purchase Log</a></li>
                      <li><a href="logoffers.php">Offerings Log</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true" onclick="logout();"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['Distributor'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a onclick="logout();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		
<!-- .................................................................................................. -->

        <!-- page content -->
		<!-- Packages -->
		<div id="Packages">
		<div class="right_col" role="main">
          <div class="" style="">
			<h3>Packages</h3>
			<br></br>
			<br></br>
			
			<div class="col-md-12">
			
			<div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2>For Large Business</h2>
                              <h1><i class="glyphicon glyphicon-king" style="font-size: 50px;"></i></h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li style="font-size: 20px;text-align: center;"> Rockie <br></br></li>
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-check text-success"></i> <strong  style="font-size: 50px;">100</strong> Coins<br></br></li>
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-check text-success" style="font-size: 20px;"></i> Offer Advertise</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="javascript:void(0);" class="btn btn-success btn-block" onclick="pendingPurchase(100);" role="button">$100</a>
                              </div>
                            </div>
                          </div>
                        </div>
						
				<div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title" style="background:#21b1ff;">
                              <h2>For Medium Business</h2>
                              <h1><i class="glyphicon glyphicon-queen" style="font-size: 50px;"></i></h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li style="font-size: 20px;text-align: center;"> Intermediate <br></br></li>
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-check text-success"></i> <strong  style="font-size: 50px;">50</strong> Coins<br></br></li>
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-times text-danger" style="font-size: 20px;"></i> No Offer Advertise</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="javascript:void(0);" style="background:#21b1ff;" onclick="pendingPurchase(50);" class="btn btn-success btn-block" role="button">$50</a>
                              </div>
                            </div>
                          </div>
                        </div>
						
				<div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title"  style="background:#ff9221;">
                              <h2>Package For Small Business</h2>
                              <h1><i class="glyphicon glyphicon-pawn" style="font-size: 50px;"></i></h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li style="font-size: 20px;text-align: center;"> Beginner <br></br></li>
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-check text-success"></i> <strong  style="font-size: 50px;">10</strong> Coins<br></br></li>
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-times text-danger" style="font-size: 20px;"></i> No Offer Advertise</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a style="background:#ff9221;" onclick="pendingPurchase(10);" class="btn btn-success btn-block" role="button">$10</a>
                              </div>
							  </div>
                          </div>
                        </div>
						
				<div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title" style="background:#2A3F54;">
                              <h2>Package On Demand</h2>
                              <h1><i class="glyphicon glyphicon-wrench" style="font-size: 50px;"></i></h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
									<li style="font-size: 20px;"><i class="glyphicon glyphicon-wrench" style="font-size: 20px;"></i>   Package Name<input type="text" class="form-control" placeholder="Package Name" id="pkgname" required /></li>
									<li style="font-size: 20px;"><i class="glyphicon glyphicon-wrench" style="font-size: 20px;"></i>   Coins<input type="number" class="form-control" placeholder="Coins" id="coins" onkeyup="cuspckgloader(event);" required /></li>
									<li style="font-size: 20px;"><i class="glyphicon glyphicon-wrench" style="font-size: 20px;"></i>   Advertise<input type="checkbox" class="form-control" id="advert"/></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a style="background:#2A3F54;" id="cuspckg" onclick="pendingPurchase(0);" class="btn btn-success btn-block" role="button">Create Package</a>
                              </div>
                            </div>
                          </div>
                        </div>
				</div>
          </div>
        </div>
		</div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Save me - Save your money from virtuality <a href="https://colorlib.com">Save me</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
	
	<!--SweetAlert-->
	<script src="../production/js/sweetalert.min.js"></script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<!-- Custom Scripts -->
	
	<script>
	function logout(){
		swal({
					title: "Are you sure?",
					type: "warning",
					showCancelButton: true,
					confirmButtonText: "Logout"},
					function(){
						location.href = "../production/logout.php";
				});
	}
	
	jQuery({ Counter: 0 }).animate({ Counter: $('.Single').text() }, {
	  duration: 2500,
	  step: function () {
		$('.Single').text(Math.ceil(this.Counter));
	  }
	});
	</script>
	
	<script>
	var pkgval=0;
	function cuspckgloader(e) {
       var cointxt = document.getElementById('coins');
       var btn = document.getElementById('cuspckg');
	   var keynum = e.which;
	   var txtval = cointxt.value;
	   var adv = document.getElementById('advert').checked;
	   if(adv){
		   txtval = parseInt(txtval)+500;
	   }
	   if(!isNaN(txtval)){
		   btn.innerHTML = "$"+(txtval/100);
		   pkgval = (txtval/100);
	   }
		//btn.innerHTML = String.fromCharCode(keynum);
    }
	</script>
	
	<script>
	var id = "<?php echo $orgID; ?>";
	function pendingPurchase(pckg){
		var saveData = $.ajax({
			  type: 'POST',
			  url: "getcc.php",
			  data: {org: id},
			  success: function(resultData) { 
			      console.log(resultData);
			      purchase(resultData,pckg); },
			  error: function(resultData) { alert("error"); }
		});
	}
	</script>

	<script>
		function purchase(ccnum,pckg){
			var money = pckg;
			if(pckg==0){
				money = pkgval;
			}
			swal({
				  title: "Confirm Purchase",
				  text: "Pay $"+money+" from cc number : "+ccnum,
				  imageUrl: "images/visa.png",
				  type: "info",
				  showCancelButton: true,
				  closeOnConfirm: false,
				  showLoaderOnConfirm: true,
				},
				function(){
					if(pckg==0){
						pckg = pkgval;
						var coins = document.getElementById('coins').value;
						var name = document.getElementById('pkgname').value;
						var offer = document.getElementById('advert').checked;
					var saveData = $.ajax({
					  type: 'POST',
					  url: "packagepurchase.php",
					  data: {org: id,name: name,coins: coins,offer: offer,cost: pckg},
					  success: function(resultData) { swal("Success!", "Coins Updated Successfully!" , "success") },
					  error: function(resultData) { alert("error"); }
					});
					}else{
					var saveData = $.ajax({
					  type: 'POST',
					  url: "packagepurchase.php",
					  data: {org: id,pkg: pckg},
					  success: function(resultData) { swal("Success!", "Coins Updated Successfully!", "success") },
					  error: function(resultData) { alert("error"); }
					});
					}
				});
		}
	</script>
  </body>
</html>
