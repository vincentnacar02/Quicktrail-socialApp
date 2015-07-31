<?php
	
	// simple logout function yet

	if (!empty($_POST["submit-logout"])) {
		$_SESSION["islogin"] = false;
		$_SESSION["user"] = "Guest";
		header("location: Index.php");
	}

?>