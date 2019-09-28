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
		<!-- Offer -->
		
		<div id="Offer">
		<div class="right_col" role="main" style="background-image: url('images/Logo.png'); background-repeat: no-repeat; background-position:top center; height:100%;">
		<div class="col-md-6 col-md-offset-3">
		<div style="text-align: center;">
          <div class="" style="">
			<h3>Add new offer</h3>
          </div>
		</div>
		<form method="post" action="offer.php" enctype="multipart/form-data">
		<br></br><br></br>
		<input type="text" class="form-control" PlaceHolder="Item name" id="itmname" name="itmname" required />
		<br></br>
		<input type="number" class="form-control" PlaceHolder="Barcode" id="itmbarcode" name="itmbarcode" required />
		<br></br>
		<input type="text" class="form-control" PlaceHolder="Description" id="itmdesc" name="itmdesc"/>
		<br></br>
		<input type="number" class="form-control" PlaceHolder="Coin Amount" id="itmcoins" name="itmcoins" required />
		<br></br>
		<!--<input type="file" class="form-control" PlaceHolder="Offerings Banner" id="itmbanner" name="itmbanner"/>-->
		<!--<br></br>-->
		<select name="availability" id="availability" PlaceHolder="Offer Availability" class="form-control">
			<option value="1">Available</option>
			<option value="0">Unavailable</option>
		<select>
		<br></br>
		<input type="submit" value="Submit" class="form-control"/>
		</form>
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Current Offerings</button>
		
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Current Offerings</h4>
        </div>
        <div class="modal-body">
            <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Item
      </th>
      <th class="th-sm">Description
      </th>
      <th class="th-sm">OfferedCoins
      </th>
      <th class="th-sm">Barcode
      </th>
    </tr>
  </thead>
  <tbody id = "tbody">
    
  </tbody>
  <tfoot>
    <tr>
      <th class="th-sm">Item
      </th>
      <th class="th-sm">Description
      </th>
      <th class="th-sm">OfferedCoins
      </th>
      <th class="th-sm">Barcode
      </th>
    </tr>
  </tfoot>
</table>
        </div>
      </div>
      
    </div>
  </div>
		
		<br></br>
            <div class="clearfix"></div>
            <br />
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
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	
	<!-- Custom Scripts -->
	<?php
	if(isset($_POST['itmbarcode'])){
		$name = $_POST['itmname'];
		$barcode = $_POST['itmbarcode'];
		$desc = $_POST['itmdesc'];
		$coins = $_POST['itmcoins'];
		$availability = $_POST['availability'];
		$org = $orgID;
// 		if($_FILES['itmbanner']['size']){
// 		$tmpName = $_FILES['itmbanner']['tmp_name'];
		
// 		$fp = fopen($tmpName,'r');
// 		$content = fread($fp,filesize($tmpName));
// 		$content = addslashes($content);
// 		fclose($fp);
		
			$query = "INSERT INTO offerings(itemName,itemBarcode,itemDescription,offeredCoinAmount,availability,organizationId) VALUES('$name',$barcode,'$desc',$coins,$availability,'$org')";
			$res = mysqli_query($conn,$query);
			if(!$res){
				echo mysqli_error($conn);
				echo '<script>swal("Error!", "Please enter valid values" , "error");</script>';
			}else{
				echo '<script>swal("Success!", "Offer Added Successfully" , "success");</script>';
			}	
// 		}
	}else{
		
	}
?>

    <script>
    $(document).ready(function () {
    var dtable = $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
    get_data();
    });
    </script>
	
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
	var count = 1;
	function addrow(){
		var tbl = document.getElementById("objtable");
		var adder = '<tr class="odd pointer"><td class="a-center "></td><td class=" "><input class="form-control" type="text" placeholder="Object ID" name="objid[]" required></td><td class=" "><input class="form-control" type="text" placeholder="Object Name" name="objname[]" required></td><td class=" "><input class="form-control" type="text" placeholder="Details" name="objdetails[]" required></td><td class=" "><input class="form-control" type="number" placeholder="Coin Value" name="objcoins[]" required></td></td></tr>';
		tbl.innerHTML = tbl.innerHTML + adder;
		count++;
	}
	
	function get_data(){
	    var dtable = $('#dtBasicExample').DataTable();
	    var data = $.ajax({
          url: "offeraval.php",
          type: "POST",
          data: {org : '<?php echo $orgID;?>'},
          success: function(data){
            console.log(data);
            var json = JSON.parse(data);
            for(var i = 0; i < json.length; i++){
            var dat = json[i];
            // var content = '<tr><td>'+dat.gameId+'</td><td>'+dat.gameObjectId+'</td><td>'+dat.playerId+'</td><td>'+dat.amount+'</td></tr>';
            dtable.row.add( [
                dat.itemName,
                dat.itemDescription,
                dat.offeredCoinAmount,
                dat.itemBarcode
            ] ).draw( false );
            }
          }
        });
	}
	</script>
  </body>
</html>
