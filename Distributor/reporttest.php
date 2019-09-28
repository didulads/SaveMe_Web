<?php
	$d = date("Y-m-d",strtotime("-2 month"));
	echo '[';
	for($i=0;$i<4;$i++){
				echo '{';
				echo "name: '$i',";
				echo "value: $i";
				echo '}';
				if($i!=3){
					echo ',';
				}
			}
	echo ']';
?>