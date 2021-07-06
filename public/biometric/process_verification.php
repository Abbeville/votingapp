<?php

if (isset($_POST['VerPas']) && !empty($_POST['VerPas'])) {
		
	include 'include/global.php';
	include 'include/function.php';
	
	$data 		= explode(";",$_POST['VerPas']);
	$user_id	= $data[0];
	$vStamp 	= $data[1];
	$time 		= $data[2];
	$sn 		= $data[3];
	
	$fingerData = getUserFinger($user_id);
	$device 	= getDeviceBySn($sn);
	$sql1 		= "SELECT * FROM users WHERE id='1'";
	$result1 	= mysqli_query($conn,$sql1);
	$data 		= mysqli_fetch_array($result1);
	// $user_name	= $data['name'];
		
	$salt = md5($sn.$fingerData[0]['finger_data'].$device[0]['vc'].$time.$user_id.$device[0]['vkey']);
	
	if (strtoupper($vStamp) == strtoupper($salt)) {
		
		// $log = createLog($user_name, $time, $sn);
		$log = 1;
		
		if ($log == 1) {
			// echo 'http://127.0.0.1:8000/cafeteria/start/order/'.$user_name;
			echo 'http://localhost/votingapp/public/app/vote';
		
		} else {
			echo 'http://localhost/votingapp/public/logout';
			// echo $base_path."messages.php?msg=$log";
			
		}
	
	} else {
		
		$msg = "Parameter invalid..";
		
		echo $base_path."messages.php?msg=$msg";
		
	}
}

?>