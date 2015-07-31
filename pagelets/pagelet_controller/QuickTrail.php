<?php
	
	require_once("Controller/Trailing.php");

	 if ($db->StartDbConnection()) {
	 	if (isset($_POST["submit-trail"])) {
	 		$doing = $_POST["Doing"];
	 		$desc = $_POST["desc"];
	 		$where = $_POST["Where"];
	 		$tag = $_POST["tags"];

	 		$trail = new Trail($_SESSION["user"],$doing,$desc,$where,$tag,$_SESSION["photolink"]);
	 		// add time
	 		if ($trail->SaveTrail($db->GetCon())) {
	 			echo "<b>Trail saved.</b>";
	 		}
	 	}
	 }

?>