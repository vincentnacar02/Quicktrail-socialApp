<html>
<head>
	<title>Trail v1.0 - Create Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Styles/Pagelet-style.css">
	<?php require_once("Controller/DbConnection.php"); ?>
</head>
<body class="ui-content">
	<div class="ui-content ui-body-m">
		<img src='trailapp.png' alt='trail app'><small>by Vincent Nacar</small>
	</div>
	<center>
	<div>
		<?php
			if (isset($_POST["submit-index"])) {
				header("Location:Index.php");
			}
			if (isset($_POST["submit-registration"])) {
				require_once("Controller/DbConnection.php");
				require_once("Controller/CreateAccount.php");
				$db = new DbConnection_Controller();
				$newAcct = new CreateAccount($_POST["email"]);
				if ($db->StartDbConnection()) {
					if (!$newAcct->CheckEmailIfExists($db->GetCon())) {
						$newAcct->GetUserData($_POST["fullname"],$_POST["sex"],$_POST["bday"],$_POST["pass"]);
						if ($newAcct->SaveNewAccount($db->GetCon())) {
							echo "success";
						}
					}else{
						echo "Email is currently used by another user.";
					}
				}
			}
		?>
		<h3>Create an Account</h3><hr>
		<form action="CreateAccount.php" method="POST">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="fullname" placeHolder="@Username" id="username"></td>
				</tr>
				<tr>
					<td>Sex:</td>
					<td><select name="sex">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select></td>
				</tr>
				<tr>
					<td>Birthday:</td>
					<td><input type="text" name="bday" placeHolder="Birthday" id="bday"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" placeHolder="Valid email" id="email"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="pass" placeHolder="Password" id="pass"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit-registration" value="Create" onClick="return ValidateInput()"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit-index" value="Back to Login"></td>
				</tr>
			</table>
		<script type="text/javascript">
			function ValidateInput()
			{
				if (document.getElementById("username").value=="") {
					alert("Please fill username.");
					return false;
				};
				if (document.getElementById("bday").value=="") {
					alert("Please fill birthday.");
					return false;
				};	
				if (document.getElementById("email").value=="") {
					alert("Please fill email.");
					return false;
				};	
				if (document.getElementById("pass").value=="") {
					alert("Please fill password.");
					return false;
				};				
			}
		</script>			
		</form>
	</div>
	</center>
</body>
</html>