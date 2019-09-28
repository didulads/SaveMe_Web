<?php 
	include 'connection.php';
	session_start();
	if(!isset($_SESSION['Player'])){
		echo '<script> location.href = "../production/login.php";</script>';
	}
	$username = $_SESSION['Player'];
	$userid = $_SESSION['userid'];
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
	
	<link rel="stylesheet" href="build/css/countrySelect.css">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;background:#ff9221;">
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
                <h2><?php echo $_SESSION['Player'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Player</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-gamepad"></i> Games <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a onclick="navigator('allgames')">All</a></li>
                      <li><a onclick="navigator('actiongames')">Action</a></li>
                      <li><a onclick="navigator('adventuregames')">Adventure</a></li>
                      <li><a onclick="navigator('racinggames')">Racing</a></li>
                    </ul>
                  </li>
                  <li><a href="coins.php"><i class="fa fa-circle-o-notch"></i> Coins </a>
                  </li>
                  <li><a href="offers.php"><i class="fa fa-ticket"></i> Offers</a>
                  </li>
                  
                  <li><a><i class="fa fa-bar-chart-o"></i> Statistics <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a onclick="navigator('analytics')">Purchases</a></li>
                      <li><a onclick="navigator('analytics')">Game Categories</a></li>
                      <li><a onclick="navigator('analytics')">Earnings</a></li>
                    </ul>
                  </li>
				  
				  <li><a><i class="fa fa-table"></i> Log <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables_dynamic.html">Purchase Log</a></li>
                      <li><a href="tables_dynamic.html">Earnings Log</a></li>
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
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['Player'];?>
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
				
				  <?php
					$q = "SELECT * FROM coinpayments INNER JOIN player ON player.PlayerID = coinpayments.playerId INNER JOIN user ON player.userID = user.userId INNER JOIN gameobject ON gameobject.gameObjectId = coinpayments.gameObjectId AND gameobject.gameId = coinpayments.gameId WHERE user.userName = '$username' LIMIT 3";
					$req = mysqli_query($conn,$q);
				  ?>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green"><?php echo mysqli_num_rows($req); ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
					while($r1 = mysqli_fetch_assoc($req)){
					echo '<li>
                      <a>
                        <span>
                          <span></span>
                        </span>
                        <span class="message">
                          You Spent '.$r1['amount'].' coins for '.$r1['objectName'].' of game '.$r1['gameId'].'
                        </span>
						<span class="time">'.$r1['paymentDate'].'</span>
                      </a>
                    </li>';
					};
					?>
					
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		
<!-- .................................................................................................. -->

        <!-- page content -->
		<div>
		<!-- All Games -->
		<div id="allgames">
		<div class="right_col" role="main" style="min-height: 500px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Games <small> All Categories </small> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">
					  <?php
						$allq = 'SELECT * FROM games';
						$allres = mysqli_query($conn,$allq);
						while($allrow = mysqli_fetch_assoc($allres)){
							$gameid = $allrow['GameID'];
							echo '<div class="col-md-55"><div class="image view view-first"><img style="height: 150px; display: block;" src="data:image/jpeg;base64,'.base64_encode($allrow['thumb']).'" alt="image" /><div class="mask"><p>'.$allrow['name'].'</p><div class="tools tools-bottom"><a href="download.php?gameid='.$gameid.'"><i class="fa fa-download"></i></a></div></div></div><div class="caption"><p>'.$allrow['description'].'</p><p>'.$allrow['filesize'].'</p></div></div>';
						}
					  ?>
					  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		</div>
		
		<!-- Action Games -->
		<div id="actiongames" style="display:none">
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Games <small> Action Category </small> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                      <div class="col-md-55">
                          <div class="image view view-first">
                            <img style="height: 150px; display: block;" src="images/coc.jpg" alt="image" />
                            <div class="mask">
                              <p>Clash of clans</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-download"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Multiplayer action game.</p>
                          </div>
                      </div>
					  
					  <div class="col-md-55">
                          <div class="image view view-first">
                            <img style="height: 150px; display: block;" src="images/MKX.jpg" alt="image" />
                            <div class="mask">
                              <p>Mortal Kombat X</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-download"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Action and fighting game.</p>
                          </div>
                      </div>
					  
					  <div class="col-md-55">
                          <div class="image view view-first">
                            <img style="height: 150px; display: block;" src="images/MC5.jpg" alt="image" />
                            <div class="mask">
                              <p>Modern Combat 5</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-download"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Shooting Action game.</p>
                          </div>
                      </div>
					  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		</div>
		
		<!-- Adventure Games -->
		
		<div id="adventuregames" style="display:none">
			<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Games <small> Adventure Category </small> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                      <div class="col-md-55">
                          <div class="image view view-first">
                            <img style="height: 150px; display: block;" src="images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Bee Life</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-download"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Game based on a bee's life</p>
                          </div>
                      </div>
					  
					  <div class="col-md-55">
                          <div class="image view view-first">
                            <img style="height: 150px; display: block;" src="images/minion.jpg" alt="image" />
                            <div class="mask">
                              <p>Minions</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-download"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Endless running game.</p>
                          </div>
                      </div>
					  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		</div>
		
		<!-- Racing Games -->
		
		<div id="racinggames" style="display:none">
			<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Games <small> Racing Category </small> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                      <div class="col-md-55">
                          <div class="image view view-first">
                            <img style="height: 150px; display: block;" src="images/media.jpg" alt="image" />
                            <div class="mask">
                              <p>Car Parking 3D</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-download"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p>Car parking game.</p>
                          </div>
                      </div>
					  
                    </div>
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<!-- Custom Scripts -->
	<script>
	function logout(){
		window.location = 'logout.php';
	}
	</script>
    <!-- /bootstrap-daterangepicker -->
	
	<script>
		function navigator(i){
		window.alert(i);
			var allgames = document.getElementById("allgames");
			var actiongames = document.getElementById("actiongames");
			var adventuregames = document.getElementById("adventuregames");
			var racinggames = document.getElementById("racinggames");
			var analytics = document.getElementById("analytics");
			
			if(i==="allgames"){
				allgames.style.display = "block";
				actiongames.style.display = "none";
				adventuregames.style.display = "none";
				racinggames.style.display = "none";
				analytics.style.display = "none";
			}
			
			if(i==="actiongames"){
				allgames.style.display = "none";
				actiongames.style.display = "block";
				adventuregames.style.display = "none";
				racinggames.style.display = "none";
				analytics.style.display = "none";
			}
			
			if(i==="adventuregames"){
				allgames.style.display = "none";
				actiongames.style.display = "none";
				adventuregames.style.display = "block";
				racinggames.style.display = "none";
				analytics.style.display = "none";
			}
			
			if(i==="racinggames"){
				allgames.style.display = "none";
				actiongames.style.display = "none";
				adventuregames.style.display = "none";
				racinggames.style.display = "block";
				analytics.style.display = "none";
			}
			
			if(i==="analytics"){
				allgames.style.display = "none";
				actiongames.style.display = "none";
				adventuregames.style.display = "none";
				racinggames.style.display = "none";
				analytics.style.display = "block";
			}
			
		}
	</script>
    <!-- /Chart.js -->
    
    
  </body>
</html>
