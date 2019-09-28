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
		

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Predefined reports</h3>
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
			
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
					<select class="" id="repselector">
						<option value="1">Customers By Age Group</option>
						<option value="2">Coin transaction comparison</option>
						<option value="3">Item purchases</option>
					</select>
					<input type="submit" value="Generate" onclick="generatereport()"/>
					</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
				  <div class="x_content">
					
                  </div>
                  <div class="x_content" id="reportdiv">
					<h1 style="text-align: center;" id="repohead"></h1>
					<p style="text-align: center;" id="repodate"></p>
                    <div id="echart_pie2" style="height:350px;"></div>
                    <div id="repdiv"></div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div id="graph">
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
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <script src="../vendors/echarts/map/js/world.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

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
	
	function generatereport(repnum){
		var repnumdiv = document.getElementById('repselector');
		var repohead = document.getElementById('repohead');
		var repodate = document.getElementById('repodate');
		var repnum = repnumdiv.options[repnumdiv.selectedIndex].value;
		repohead.innerHTML = repnumdiv.options[repnumdiv.selectedIndex].innerHTML;
		repodate.innerHTML = 'Date : 2017-01-11';
		alert(repnum);
		if(repnum==1){
			var repcontent = '<?php $checker = true; 
				$sql = "SELECT * FROM `earnings` AS ea LEFT JOIN offerings as of on ea.offeringId = of.offeringId LEFT JOIN (SELECT dateOfBirth,PlayerID,userName FROM player as pl INNER JOIN user as u ON u.userId = pl.userID) AS p ON ea.Player_id = p.PlayerID WHERE of.organizationId = '$orgID' GROUP BY p.PlayerID";
				$res = mysqli_query($conn,$sql);
				$junior = 0;
				$young = 0;
				$senior = 0;
				$contentarr = Array();
				$titlearray = ['Age: <18','30> Age: <18','Age: >30'];
				$titles = "['".implode("','",$titlearray)."']";;
				echo '<br></br>';
				echo '<table id="datatable-buttons" class="table table-striped table-bordered">';
				echo "<thead><th>Age</th><th>PlayerName</th><th>Amount</th></thead><tbody>";
				while($row = mysqli_fetch_assoc($res)){
					$age = floor((time() - strtotime($row['dateOfBirth']))/31556926);
					echo '<tr>';
					echo '<td>'.$age.'</td>';
					echo '<td>'.$row['userName'].'</td>';
					echo '<td>'.$row['earnedAmount'].'</td>';
					if($age>=0 && $age<18){
						$junior++;
					}else if($age>=18 && $age<30){
						$young++;
					}else{
						$senior++;
					}
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
				$contentarr = [$junior,$young,$senior];
			?>';
			
			var echartPieCollapse = echarts.init(document.getElementById('echart_pie2'), theme);
			  echartPieCollapse.setOption({
				tooltip: {
				  trigger: 'item',
				  formatter: "{a} <br/>{b} : {c} ({d}%)"
				},
				legend: {
				  x: 'center',
				  y: 'bottom',
				  data: <?php echo $titles; ?>
				},
				toolbox: {
				  show: true,
				  feature: {
					magicType: {
					  show: true,
					  type: ['pie', 'funnel']
					},
					restore: {
					  show: true,
					  title: "Restore"
					},
					saveAsImage: {
					  show: true,
					  title: "Save Image"
					}
				  }
				},
				calculable: true,
				series: [{
				  name: 'Area Mode',
				  type: 'pie',
				  radius: [25, 90],
				  center: ['50%', 170],
				  roseType: 'area',
				  x: '50%',
				  max: 40,
				  sort: 'ascending',
				  data: <?php
					$d = date("Y-m-d",strtotime("-2 month"));
					if($checker){
					echo '[';
					for($i=0;$i<sizeof($contentarr);$i++){
								echo '{';
								echo "name: '$titlearray[$i]',";
								echo "value: $contentarr[$i]";
								echo '}';
								if($i!=(sizeof($contentarr)-1)){
									echo ',';
								}
							}
					echo ']';
					}
				?>
				}]
			  });
		}
		
		if(repnum==2){
			var repcontent = '<?php $checker = true; 
				$sql = "SELECT username,organizationId,sum FROM user INNER JOIN organization ON user.userId = organization.userId INNER JOIN (SELECT SUM(amount) AS sum ,organizationId FROM `packagepurchases` GROUP BY `organizationId`) AS s ON organization.Organization_ID = s.organizationId";
				$res = mysqli_query($conn,$sql);
				$junior = 0;
				$young = 0;
				$senior = 0;
				$contentarr2 = Array();
				$titlearray = [];
				
				echo '<br></br>';
				echo '<table id="datatable-buttons" class="table table-striped table-bordered">';
				echo "<thead><th>Organization Name</th><th>Coins</th><th>Money</th></thead><tbody>";
				while($row = mysqli_fetch_assoc($res)){
					echo '<tr>';
					echo '<td>'.$row['username'].'</td>';
					echo '<td>'.($row['sum']*100).'</td>';
					echo '<td>$'.$row['sum'].'</td>';
					if($row['username']==$_SESSION['Distributor']){
						$organ = "My Organization";
					}else{
						$organ = $row['username'];
					}
					array_push($contentarr2,$row['sum']);
					array_push($titlearray,$organ);
					echo '</tr>';
				}
				$titles = "['".implode("','",$titlearray)."']";
				echo '</tbody>';
				echo '</table>';
			?>';
			
			  var echartPieCollapse = echarts.init(document.getElementById('echart_pie2'), theme);
			  echartPieCollapse.setOption({
				tooltip: {
				  trigger: 'item',
				  formatter: "{a} <br/>{b} : {c} ({d}%)"
				},
				legend: {
				  x: 'center',
				  y: 'bottom',
				  data: <?php echo $titles; ?>
				},
				toolbox: {
				  show: true,
				  feature: {
					magicType: {
					  show: true,
					  type: ['pie', 'funnel']
					},
					restore: {
					  show: true,
					  title: "Restore"
					},
					saveAsImage: {
					  show: true,
					  title: "Save Image"
					}
				  }
				},
				calculable: true,
				series: [{
				  name: 'Area Mode',
				  type: 'pie',
				  radius: [25, 90],
				  center: ['50%', 170],
				  roseType: 'area',
				  x: '50%',
				  max: 40,
				  sort: 'ascending',
				  data: <?php
					$d = date("Y-m-d",strtotime("-2 month"));
					if($checker){
					echo '[';
					for($i=0;$i<sizeof($contentarr2);$i++){
								echo '{';
								echo "name: '$titlearray[$i]',";
								echo "value: $contentarr2[$i]";
								echo '}';
								if($i!=(sizeof($contentarr)-1)){
									echo ',';
								}
							}
					echo ']';
					}
				?>
				}]
			  });
			}
			
			if(repnum==3){
				
				var echartBar = echarts.init(document.getElementById('echart_pie2'), theme);

				  echartBar.setOption({
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
					},{name: 'Coin Offers',
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
					},{
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
				
			}
		
		repdiv.innerHTML = repcontent;
	}
    </script>
  </body>
</html>