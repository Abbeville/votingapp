<?php

if (isset($_POST['RegTemp']) && !empty($_POST['RegTemp'])) {
		
    	include 'include/global.php';
    	include 'include/function.php';
		
		$data 		= explode(";",$_POST['RegTemp']);
		$vStamp 	= $data[0];
		$sn 		= $data[1];
		$user_id	= $data[2];
		$regTemp 	= $data[3];
		$user_id	= substr($user_id, -1);
		$device = getDeviceBySn($sn);
		
		$salt = md5($device[0]['ac'].$device[0]['vkey'].$regTemp.$sn.$user_id);
		
		if (strtoupper($vStamp) == strtoupper($salt)) {
			
			$sql1 		= "SELECT MAX(id) as fid FROM fingers WHERE student_id=".$user_id;
			// $result1 	= mysqli_query($conn,$sql1);
			// $data 		= mysqli_fetch_array($result1);
			$result1 	= $conn->query($sql1);
			$data 		= $result1->fetch_array()[0];
			$fid 		= $data['fid'];

			$fid = 0;
			
			if ($fid == 0) {
				$sq2 		= "INSERT INTO fingers SET student_id='".$user_id."', finger_data='".$regTemp."' ";
				$result2	= mysqli_query($conn,$sq2);
				if ($result1 && $result2) {
					$res['result'] = true;				
				} else {
					$res['server'] = "Error insert registration data!";
				}
			} else {
				$res['result'] = false;
				$res['user_finger_'.$user_id] = "Template already exist.";
			}

			echo 'localhost/votingapp/public/admin/users';
			
		} else {
			
			$msg = "Parameter invalid..";
			
			echo $base_path."messages.php?msg=$msg";
			
		}

		
}

?>