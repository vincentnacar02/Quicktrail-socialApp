<html>
<head>
	<title>Trail v1.0</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/Pagelet-style.css">
	<?php require_once("Controller/DbConnection.php"); ?>
	<?php require_once("Controller/LoginController.php"); ?>
	<?php require_once("Controller/EventLogger.php"); ?>
    <script language="javascript" type="text/javascript">
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>
</head>
<body class="ui-content">
	<div class="ui-content ui-body-m">
		<img src='trailapp.png' alt='trail app'><small>by Vincent Nacar</small>
	</div>
	<?php

	session_start();
	// create session
	if (!isset($_SESSION["islogin"])) {
		$_SESSION["islogin"] = false;
	}

		if ($_SESSION["islogin"]==true) {
			require_once("pagelets/Logout.php"); // for logout function
			//require_once("pages/welcome.php");
			//require_once("pages/default.php");
			header("location: Dashboard.php");
		}else{
			require_once("Initialization/Login_Initialize.php"); // calling important variables
			require_once("pagelets/pagelet_controller/Login.php"); // calling pagelet controller	
			require_once("pagelets/Login.php"); // calling login page		
		}	
	?>
</body>
<div>
	<center>
		<table>
			<tr>
				<td><a href="" class="ui-btn ui-btn-inline">Faq's</a>
				<td><a href="" class="ui-btn ui-btn-inline">User's Agreement</a>
			</tr>
		</table>
	</center>
</div>
</html>