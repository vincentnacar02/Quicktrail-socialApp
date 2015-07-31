<?php
	 // Establish Connection
	 if ($db->StartDbConnection()) {
		 //Login 
		 if (isset($_POST["submit-login"])) {
		 	$user = $_POST["user"];
		 	$pass = $_POST["pass"];

		 	$login->SetCredential($user,$pass);
		 	$log->LogEvent("Event=UserLogin-setcredential;username=".$user.";password=".$pass.";");
		 	if ($login->Authenticate($db->GetCon())) {
				$log->LogEvent("Event=UserLogin-success;username=".$user.";password=".$pass.";");		 		
		 		echo "Login success.";
		 		//$_SESSION["userID"] = $user;
		 		$_SESSION["user"] = $login->GetLoginUser($db->GetCon(),$_SESSION["userID"]);
		 		$_SESSION["islogin"] = true;
		 		header("location: Index.php");
		 	}else{
		 		echo "Login failed.";
		 		$_SESSION["islogin"] = false;
		 	}
		 }
		 if (isset($_POST["submit-register"])) {
		 	 header("Location:CreateAccount.php");
		 }	 	
	 }else{
	 	echo "Connection Failed!";
	 }

?>