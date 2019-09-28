<?php 
	include 'connection.php';
	session_start();
	if(!isset($_SESSION['Developer'])){
		echo '<script>location.href="../production/login.php"</script>';
	}
	$username = $_SESSION['Developer'];
	$user_id = $_SESSION['userid'];
	
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
	<!-- Dropzone.js -->
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../production/css/sweetalert.css">
	
	<link rel="stylesheet" href="build/css/countrySelect.css">
	
	<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;background:#21b1ff;">
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
                <h2><?php echo $_SESSION['Developer'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Developer</h3>
                <ul class="nav side-menu">
                  <li><a onclick="navigator('upload')"><i class="fa fa-gamepad"></i> Upload Games </a>
                  </li>
                  <li><a onclick="navigator('reggame')"><i class="fa fa-circle-o-notch"></i> Register Objects </a>
                  </li>
                  <li><a onclick="navigator('withdraw')"><i class="fa fa-ticket"></i> Withdrawals</a>
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
                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['Developer'];?>
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
		
		<!-- Upload Games -->
		<div id="upload">
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Games</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="row">
					
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
					  <div class="x_title">
						<h2>Upload New Game</h2>
						<div class="clearfix"></div>
					  </div>
					  <?php
						$nameq = "SELECT developerId FROM developer INNER JOIN user ON user.userId = developer.userId WHERE user.userName = '$username'";
						$resname = mysqli_query($conn,$nameq); 
						$devrow = mysqli_fetch_assoc($resname);
						$devid = $devrow['developerId'];
					  ?>
					  <div class="x_content">
					  <form method="POST" enctype="multipart/form-data" action="upload.php">
						<h4>Apk File</h4>
							<input type="file" class="form-control" name="ups" id="ups">
						<h4>Thumbnail</h4>
							<input type="file" class="form-control" name="thumb" id="thumb">
						<h4>Name</h4>
							<input type="text" class="form-control" name="gamename" id="gamename">
						<h4>Description</h4>
							<input type="text" class="form-control" name="desc" id="desc">
						<h4>Game Type</h4>
							<select class="form-control" name="gametype" id="gametype">
								<option value="Arcade">Arcade</option>
								<option value="Action">Action</option>
								<option value="Racing">Racing</option>
							</select>
							<br></br>
							<input type="hidden" name="gameid" value="<?php 
							$queryp = "SELECT * FROM games";
							$resultp = mysqli_query($conn,$queryp);
							if(mysqli_num_rows($resultp)<9){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'GAME_000'.$rowcount;
							echo 'GAME_000'.$rowcount;}
							else if(mysqli_num_rows($resultp)<99){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'GAME_00'.$rowcount;
							echo 'GAME_00'.$rowcount;}
							else if(mysqli_num_rows($resultp)<999){
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'GAME_0'.$rowcount;
							echo 'GAME_0'.$rowcount;}
							else{
							$rowcount = mysqli_num_rows($resultp)+1;
							$val = 'GAME_'.$rowcount;
							echo 'GAME_'.$rowcount;}
					?>" readonly>
							<label style="font-size:20px;">YOUR GAME ID IS : <strong><?php echo $val; ?></strong></label>
							<input type="hidden" value="<?php echo $devid; ?>" name="developerid">
							<input type="submit" value="Upload" class="form-control" name="uploadbtn">
						</form>
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
		
		<!-- Register Objects -->
		<div id="reggame" style="display: none">
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Games <small> Register Object </small> </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="row">
					
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
					  <div class="x_title">
						<h2>Register Game Objects</h2>
						<div class="clearfix"></div>
					  </div>
					  <div class="x_content">
						<form method="POST" action="objreg.php">
						<h4>My Games</h4>
							<select class="form-control" name="gamename" id="gamename">
								<?php
								
									$que = "SELECT name,GameID FROM games WHERE Developer_id = '$devid'";
									$resq = mysqli_query($conn,$que);
									while($rowq=mysqli_fetch_assoc($resq)){
										echo '<option value="'.$rowq['GameID'].'">'.$rowq['name'].'</option>';
									}
								?>
							</select>
							<input type="hidden" name="devid" value="<?php echo $devid; ?>">
							
							<br></br>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="button" id="check-all" class="flat" value="+" style="color: black;" onclick="addrow();">
                            </th>
                            <th class="column-title">Object ID </th>
                            <th class="column-title">Object Name </th>
                            <th class="column-title">Details </th>
                            <th class="column-title">Coin Value </th>
                            </th>
                          </tr>
                        </thead>

                        <tbody id="objtable">
							<tr class="even pointer"><td class="a-center "></td><td class=" "><input class="form-control" type="text" placeholder="Object ID" name="objid[]" value="" required></td><td class=" "><input class="form-control" type="text" placeholder="Object Name" name="objname[]" required></td><td class=" "><input class="form-control" type="text" placeholder="Details" name="objdetails[]" required></td><td class=" "><input class="form-control" type="number" placeholder="Coin Value" name="objcoins[]" required></td></td></tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
							<br></br>
							<input type="submit" value="Register" class="form-control" name="uploadbtn">
						</form>
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
		
		<!-- Withdrawal -->
		<div id="withdraw">
		<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Earnings</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="row">
					
					<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
					  <div class="x_title">
						<h2>Current Earnings</h2>
						<div class="clearfix"></div>
					  </div>
					  <input type="date" id="selDate" />
					  <input type="button" onclick="get_highest_by_date()" value="Get Highest for the date"/>
					  <h3 id="with_lbl"></h3>
					  <h3 id="high_lbl"></h3>
					  <h3 id="high_lbl_date"></h3>
					  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">GameID
      </th>
      <th class="th-sm">ObjectID
      </th>
      <th class="th-sm">PlayerID
      </th>
      <th class="th-sm">Amount
      </th>
    </tr>
  </thead>
  <tbody id = "tbody">
    
  </tbody>
  <tfoot>
    <tr>
      <th>GameID
      </th>
      <th>ObjectID
      </th>
      <th>PlayerID
      </th>
      <th>Amount
      </th>
    </tr>
  </tfoot>
</table>
					  
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
	<script src="../production/js/sweetalert.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	
	<!-- Dropzone.js -->
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
    
    <script>
    $(document).ready(function () {
    var dtable = $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
    </script>
	
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
	</script>
	<script>
		function navigator(i){
			var upload = document.getElementById("upload");
			var reggame = document.getElementById("reggame");
			var withdraw = document.getElementById("withdraw");
			
			if(i==="upload"){
				upload.style.display = "block";
				reggame.style.display = "none";
				withdraw.style.display = "none";
			}
			
			if(i==="reggame"){
				upload.style.display = "none";
				reggame.style.display = "block";
				withdraw.style.display = "none";
			}
			
			if(i==="withdraw"){
				upload.style.display = "none";
				reggame.style.display = "none";
				withdraw.style.display = "block";
				get_data();
			}
		}
	</script>
	<script>
		Dropzone.autoDiscover = false;
		var element = document.getElementById('dropform');
		var mydrop = new Dropzone(element,{
			url: "upload.php",
			autoProcessQueue: false
		});
		
		$('#dropsubmit').click(function(){
			mydrop.processQueue();
		});
	</script>
	<script>
	var count = 1;
	function addrow(){
		var tbl = document.getElementById("objtable");
		var adder = '<tr class="odd pointer"><td class="a-center "></td><td class=" "><input class="form-control" type="text" placeholder="Object ID" name="objid[]" required></td><td class=" "><input class="form-control" type="text" placeholder="Object Name" name="objname[]" required></td><td class=" "><input class="form-control" type="text" placeholder="Details" name="objdetails[]" required></td><td class=" "><input class="form-control" type="number" placeholder="Coin Value" name="objcoins[]" required></td></td></tr>';
		tbl.innerHTML = tbl.innerHTML + adder;
		count++;
	}
	
	var withdrawals = 0;
	
	function get_data(){
	    get_highest();
	    var dtable = $('#dtBasicExample').DataTable();
	    var data = $.ajax({
          url: "withdrawals.php",
          type: "POST",
          data: {dev : '<?php echo $user_id; ?>'},
          success: function(data){
            console.log(data);
            var json = JSON.parse(data);
            dtable.clear();
            for(var i = 0; i < json.length; i++){
            var dat = json[i];
            // var content = '<tr><td>'+dat.gameId+'</td><td>'+dat.gameObjectId+'</td><td>'+dat.playerId+'</td><td>'+dat.amount+'</td></tr>';
            withdrawals = withdrawals + dat.amount;
            dtable.row.add( [
                dat.gameId,
                dat.gameObjectId,
                dat.playerId,
                dat.amount
            ] ).draw( false );
            }
          }
        });
        $('#with_lbl').html('You can withdraw : $'+withdrawals+'');
	}
	
	
	function get_highest(){
	    var data = $.ajax({
          url: "highest.php",
          type: "POST",
          success: function(data){
            console.log(data);
            var json = JSON.parse(data);
            console.log(json);
            $('#high_lbl').html('Highest : '+json[0].obj+' -> '+json[0].no+' Objects');
          }
        });
	}
	
	function get_highest_by_date(){
	    var date = $('#selDate').val();
	    var data = $.ajax({
          url: "highest.php",
          type: "POST",
          data: {date:date},
          success: function(data){
            console.log('GET HIGHEST BY DATE '+date);
            var json = JSON.parse(data);
            if(json.length > 0){
            console.log(json);
            $('#high_lbl_date').html('Highest for '+date+' : '+json[0].obj+' -> '+json[0].no+' Objects');
            } else {
                $('#high_lbl_date').html('No items found for this date');
            }
          }
        });
        
	}
	</script>
  </body>
</html>
