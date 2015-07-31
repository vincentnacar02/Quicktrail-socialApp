<?php
	if (isset($_POST["submit-comment"])) {
		if ($db->StartDbConnection()) {
			$trailID = $_POST["trailID"];
			$comment = $_POST["comment"];
			$sql = "Insert into tblQuickComment
			(fkTrailID,fk_MemberID,fcName,fcComment,fcDate)
			Values
			('".$trailID."','".$_SESSION["userID"]."','".$_SESSION["user"]."',
			'".$comment."',GETDATE())";
			if (odbc_exec($db->GetCon(),$sql)) {
				// log success
			}
		}
	}
?>