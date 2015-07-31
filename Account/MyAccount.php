<div id="myprofile">
<center>
<?php
	
	require_once("Account/AccountController.php");

	$user = new AccountController($_SESSION["userID"]);
	$user->LoadUserInfo($db->GetCon());


?>
</center>
<?php

	require_once("views/MyTrail.php");

?>
</div>