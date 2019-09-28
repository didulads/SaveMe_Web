<?php 
	session_start();
	include 'connection.php';
	if(!isset($_SESSION['Player'])){
		echo 'alert("sessions not defined");';
		echo '<script> location.href = "../production/login.php";</script>';
	}
	$username = $_SESSION['Player'];
	$userq = "SELECT * FROM player INNER JOIN user ON player.userId = user.userId WHERE user.userName = '$username';";
	$res = mysqli_query($conn,$userq);
	$row = mysqli_fetch_assoc($res);
	$orgID = $row['PlayerID'];
	$coins = $row['coinBalance'];
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
                      <li><a href="index.php" onclick="navigator('allgames')">All</a></li>
                      <li><a href="index.php" onclick="navigator('actiongames')">Action</a></li>
                      <li><a href="index.php" onclick="navigator('adventuregames')">Adventure</a></li>
                      <li><a href="index.php" onclick="navigator('racinggames')">Racing</a></li>
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

        <!-- page content -->
		<!-- style="background-image: url('images/Logo.png'); " -->
        <div class="right_col" role="main">
          <div class="">
		  <div style="line-height: 90px;">
            <div class="page-title">
              <div class="title_left">
                <h3>Offers</h3>
              </div>
            </div>
			</div>
			

            <div class="clearfix"></div>
			<br></br>
            <div class="row">
              <div class="col-md-12">
                <div class="">
				<?php
				$sql = "SELECT * FROM offerings INNER JOIN (SELECT * FROM `packagepurchases` INNER JOIN package ON packagepurchases.packageId = package.Package_id ) AS pu ON offerings.organizationId = pu.organizationId  GROUP BY itemName DESC";
				$res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($res)){
					if($row['offerimg']!=null){
					$src ="data:image/jpeg;base64,".base64_encode($row['offerimg'])."";}
					else{ $src="images/visa.png"; }
                  echo '<div class="col-md-55">
                          <div class="image view view-first">
                            <img style="height: 300px; display: block;" src='.$src.' alt="image" />
                            <div class="mask">
                              <p><strong>'.$row['itemName'].'</strong></p>
							  <p><strong>Name: </strong>'.$row['itemDescription'].'</p>
							  <p><strong>Offer: </strong>'.$row['offeredCoinAmount'].' Coins</p>
                            </div>
                          </div>
                      </div>';
				}
				?>	  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- chart js -->
    <!-- <script type="text/javascript" src="js/moment/moment.min.js"></script> -->
    <!-- <script src="js/chartjs/chart.min.js"></script> -->
    <!-- bootstrap progress js -->
    <!-- <script src="js/progressbar/bootstrap-progressbar.min.js"></script> -->
    <!-- icheck -->
    <!-- <script src="js/icheck/icheck.min.js"></script> -->

    <!-- <script src="../build/js/custom.min.js"></script> -->

    <!-- pace -->
    <!-- <script src="js/pace/pace.min.js"></script> -->

    <!-- sparkline -->
    <!-- <script src="js/sparkline/jquery.sparkline.min.js"></script> -->
    <!-- easypie -->
    <!-- <script src="js/easypie/jquery.easypiechart.min.js"></script> -->
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