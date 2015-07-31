<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/Pagelet-style.css">
	<?php require_once("Controller/DbConnection.php"); ?>
	<?php require_once("Controller/EventLogger.php"); ?>

	<?php 
	session_start();
	$db = new DbConnection_Controller();
	require_once("pagelets/Logout.php"); 
	require_once("pagelets/pagelet_controller/QuickTrail.php");
	require_once("pagelets/Comment.php");
	?> 
    <script language="javascript" type="text/javascript">
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</head>
<body data-role="main" class="ui-content">
<form action="Dashboard.php" method="post" class="ui-body-n">
	<div class="ui-content ui-body-m">
	<center>
		<?php 
		if (isset($_SESSION["user"])) {
			echo "<table>
					<tr>
						<td>
						<img src='trailapp.png' alt='trail app'> 
						</td>
					</tr>
				</table>";
		}		
		?>
		<table>
			<tr>
				<td><input type="submit" name="submit-home" value="Trails"></td>
				<td><input type="submit" name="submit-users" value="Users"></td>
				<td>
				<?php
					echo '<input type="submit" name="submit-myaccount" value="'.$_SESSION["user"].'">';
				?>
				</td>
				<td><input type="submit" name="submit-logout" value="Logout"></td>
			</tr>
		</table>
	</center>
	</div>
	<div class="ui-content">
		<center>
		<table>
			<tr>
				<td style="width:800px;">
					<?php

						//default
						if (!isset($_POST["submit-home"])
							&&!isset($_POST["submit-myaccount"])
							&&!isset($_POST["submit-logout"])
							&&!isset($_POST["submit-users"])
							&&!isset($_POST["submit-searchuser"])) {
							require_once("pagelets/QuickTrail.php");
							require_once("views/MyTrail.php"); // global trails
						}


						if (isset($_POST["submit-home"])) {
							require_once("pagelets/QuickTrail.php");
							require_once("views/MyTrail.php"); // global trails
						}
						if (isset($_POST["submit-users"])) {
							require_once("Users/UsersDirectory.php"); // calling search page
						}
						if (isset($_POST["submit-searchuser"])) {
							require_once("Users/UsersDirectory.php"); // calling search page after search
						}
						if (isset($_POST["submit-myaccount"])) {
							require_once("Account/MyAccount.php"); // calling account page
						}

					?>
				</td>
			</tr>
		</table>
		</center>
	</div>
</form>
<hr>
<div>
	<center>
		<h2 style="color:teal;">Trail 2015</h2>
		<a href="https://www.facebook.com/virenst26">by Vincent Nacar</a>
	</center>
</div>
</body>
</html>