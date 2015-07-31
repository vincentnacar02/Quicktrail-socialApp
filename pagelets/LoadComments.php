<?php

	if (isset($_GET["id"])) {
		//session_start();
		require_once("C:\wamp\www\QuickTrail/Controller/DbConnection.php");
		$db = new DbConnection_Controller();

		if ($db->StartDbConnection()) {
			$query = "Select pkCommentID,fk_MemberID,fcName,fcComment,fcDate
						from tblQuickComment where fkTrailID='".$_GET["id"]."'
						order by pkCommentID desc";
			$rows = odbc_exec($db->GetCon(),$query);
			while(odbc_fetch_row($rows)){
				$commentID = odbc_result($rows,"pkCommentID");
				$userID = odbc_result($rows,"fk_MemberID");
				$name = odbc_result($rows,"fcName");
				$comment = odbc_result($rows,"fcComment");
				$date = odbc_result($rows,"fcDate");
				echo "
					<div class='ui-content' id='".$commentID."' style='background-color:white;'>
						<table>
							<tr>
								<td><b style='color:teal;'>".$name."</b></td>
								<td><small style='color:gray;'>says</small></td>
								<td>".$comment."</td>
							</tr>
							<tr>
								<td colspan='4'><small style='color:gray;'>".$date."</small></td>
							</tr>
						</table>
					</div>
						";
			}
		}
	}
?>