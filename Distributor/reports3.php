<?php 
	session_start();
	include 'connection.php';
	if(!isset($_SESSION['Distributor'])){
		echo 'alert("sessions not defined");';
		header("location: ../production/login.php");
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
                      <li><a href="reports1.php">Purchases</a></li>
                      <li><a href="reports2.php">Game Categories</a></li>
                      <li><a href="reports3.php">Earnings</a></li>
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
		
		<!-- Coin Balance -->
		<div id="Coins">
		<div class="right_col" role="main" style="background-image: url('images/Logo.png'); background-repeat: no-repeat; background-position:top center; height:100%; ">
		<div style="">
          <div class="" style="">
			<h3>Coin Balance</h3>
          </div>
		</div>
		<h1 style="font-size: 80px; text-align: center; color: black;"><span class="Single"><?php echo $coins; ?> </span> Coins</h1>
		<br></br>
		<br></br>
		<br></br>
		<div class="col-md-12 col-sm-12 col-xs-12" style="display: inline-block;">
                    <div id="mainb" style="height:350px; align: center;"></div>
              </div>
        </div>
		</div>
		
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
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-check text-success"></i> <strong  style="font-size: 50px;">10000</strong> Coins<br></br></li>
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
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-check text-success"></i> <strong  style="font-size: 50px;">5000</strong> Coins<br></br></li>
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
                                    <li style="font-size: 20px;text-align: center;"><i class="fa fa-check text-success"></i> <strong  style="font-size: 50px;">1000</strong> Coins<br></br></li>
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
						
				
				<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Button Example <small>Users</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>
                        </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>63</td>
                          <td>2011/07/25</td>
                          <td>$170,750</td>
                        </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <td>66</td>
                          <td>2009/01/12</td>
                          <td>$86,000</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
				
				</div>
          </div>
        </div>
		</div>
		
		<!-- Offer -->
		<div id="Offer">
		<div class="right_col" role="main" style="background-image: url('images/Logo.png'); background-repeat: no-repeat; background-position:top center; height:100%; ">
		<div style="">
          <div class="" style="">
			<h3>Add new offer</h3>
          </div>
		</div>
		
		<br></br><br></br>
		<input type="text" class="form-control" PlaceHolder="Item name" id="itmname" required />
		<br></br>
		<input type="number" class="form-control" PlaceHolder="Barcode" id="itmbarcode" required />
		<br></br>
		<input type="text" class="form-control" PlaceHolder="Description" id="itmdesc"/>
		<br></br>
		<input type="number" class="form-control" PlaceHolder="Coin Amount" id="itmcoins" required />
		<br></br>
		<select id="availability" PlaceHolder="Offer Availability" class="form-control">
			<option value="1">Available</option>
			<option value="0">Unavailable</option>
		<select>
		<br></br>
		<input type="submit" value="Submit" class="form-control" onclick="addOffer();"/>
        </div>
		</div>
		
            <div class="clearfix"></div>
            <br />
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
	<!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>
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
	
	<!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
	
	<!-- Custom Scripts -->
	
		<!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
	
	<script>
	function logout(){
		window.alert("Loging out");
		window.location = '../production/logout.php';
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
			  success: function(resultData) { purchase(resultData,pckg); },
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
	
	<script>
		function addOffer(){
			var itmname = document.getElementById('itmname').value;
			var itmbarcode = document.getElementById('itmbarcode').value;
			var itmdesc = document.getElementById('itmdesc').value;
			var itmcoins = document.getElementById('itmcoins').value;
			var availability = document.getElementById('availability').value;
			alert("In");
			var saveData = $.ajax({
					  type: 'GET',
					  url: "../Transactions/addOffer.php",
					  data: {orgid: id,name: itmname,barcode: itmbarcode,desc: itmdesc,coins: itmcoins,aval: availability},
					  success: function(resultData) { swal("Success!", resultData , "success") },
					  error: function(resultData) { alert(resultData); }
					});
		}
	</script>
	
	<script>
		function navigator(i){
		window.alert(i);
			var allgames = document.getElementById("Coins");
			var actiongames = document.getElementById("Packages");
			var adventuregames = document.getElementById("Offer");
			var analytics = document.getElementById("analytics");
			var purchaselog = document.getElementById("purchaseLog");
			
			if(i==="Coins"){
				allgames.style.display = "block";
				actiongames.style.display = "none";
				adventuregames.style.display = "none";
				purchaselog.style.display = "none";
				analytics.style.display = "none";
			}
			
			if(i==="Packages"){
				allgames.style.display = "none";
				actiongames.style.display = "block";
				adventuregames.style.display = "none";
				purchaselog.style.display = "none";
				analytics.style.display = "none";
			}
			
			if(i==="Offer"){
				allgames.style.display = "none";
				actiongames.style.display = "none";
				adventuregames.style.display = "block";
				purchaselog.style.display = "none";
				analytics.style.display = "none";
			}
			
			if(i==="purchaseLog"){
				allgames.style.display = "none";
				actiongames.style.display = "none";
				adventuregames.style.display = "none";
				purchaselog.style.display = "block";
				analytics.style.display = "none";
			}
			
			if(i==="analytics"){
				allgames.style.display = "none";
				actiongames.style.display = "none";
				adventuregames.style.display = "none";
				purchaselog.style.display = "none";
				analytics.style.display = "block";
			}
			
		}
	</script>
    <!-- /Chart.js -->
	
	
    <script>
      var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

	  
	  //
      var echartBar = echarts.init(document.getElementById('mainb'), theme);

      echartBar.setOption({
        title: {
          text: 'Coin Transactions',
          subtext: 'For Past week'
        },
        tooltip: {
          trigger: 'axis'
        },
        legend: {
          data: ['Coin Offers', 'Coin Purchases']
        },
        toolbox: {
          show: false
        },
        calculable: false,
        xAxis: [{
          type: 'category',
          data: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday']
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Coin Offers',
          type: 'bar',
          data: [25,90,12,50,28,25,82],
          markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: 'average'
            }]
          }
        }, {
          name: 'Coin Purchases',
          type: 'bar',
          data: [0,0,0,1000,0,0,0],
          markPoint: {
            data: [{
              name: 'Coin Offers',
              value: 182.2,
              xAxis: 7,
              yAxis: 183,
            }, {
              name: 'Coin Purchases',
              value: 2.3,
              xAxis: 11,
              yAxis: 3
            }]
          },
		  markPoint: {
            data: [{
              type: 'max',
              name: 'max'
            }]
          },
          markLine: {
            data: [{
              type: 'average',
              name: '???'
            }]
          }
        }]
      });
    </script>

  </body>
</html>
