<?
	$moduleErrorString = "";

	if (!defined("ACK")) define("ACK", "1");
	if (!defined("NAK")) define("NAK", "0");

	// DEFAULT FUNCTION
	function mapFunction($command) {
		if ($command == 'si') return "signIn";
		else if ($command == 'so') return "signOut";
		else if ($command == 'us') return "userSearch";
		else return null;
	}

	function response($status, $description) {
		$return_array['status'] = $status;
		$return_array['description'] = $description;

		//header('Content-type: text/json');
		echo json_encode($return_array);
	}
	
	function signIn($database, $token) {
		$postdata = file_get_contents("php://input");
		if ($postdata == "") exit();
		
		$signInData = json_decode($postdata, true);
		
		$sql  = "select * from user where (user_name = '".$signInData['u']."' or user_email = '".$signInData['u']."') and ";
		$sql .= "user_password = '".$signInData['p']."'";
		
		if (($resultset = $database->query($sql)) != null) {
			if (($fields = $resultset->getRow()) != null) {
				$_SESSION['USERID'] = $fields['user_id'];
				//$_SESSION['AUTHKEY'] = $fields['user_authkey'];
				$_SESSION['USER'] = $fields['user_name'];
				$_SESSION['NAME'] = $fields['user_fullname'];
				
				response(ACK, "OK");
				
				$sql = 'update user set user_lastlogin = now() where user_id = '.$fields['user_id'];
				$database->query($sql);
			} else {
				//unset($_SESSION['AUTHKEY']);
				unset($_SESSION['USERID']);
				unset($_SESSION['USER']);
				unset($_SESSION['NAME']);
				response(NAK, "FAILED");
			}
			return true;
		} else response(NAK, "We are really sorry our system is very busy. Try again later.");
		return false;
	}
	
	function signOut($database, $token) {
		//unset($_SESSION['AUTHKEY']);
		unset($_SESSION['USERID']);
		unset($_SESSION['USER']);
		response(ACK, "OK");
		
		return true;;
	}
	
	function userSearch($database, $token) {
		$postdata = file_get_contents("php://input");
		if ($postdata == "") exit();
		
		$usersearch = $token[2];
		
		$response['status'] = ACK;
		$response['user'] = array();
		$sql = "select * from user where user_name like '$usersearch%' or user_fullname like '$usersearch%'";
		
		if (($resultset = $database->query($sql)) != null) {
			while (($fields = $resultset->getRow()) != null) {
				$user['userId'] = $fields['user_id'];
				$user['user'] = $fields['user_name'];
				$user['userName'] = $fields['user_fullname'];
				$user['profilePic'] = "/images/profile".$fields['user_id'].".jpg";
				
				$response['user'][] = $user;
			}
		}
		
		echo json_encode($response);
	}
?>