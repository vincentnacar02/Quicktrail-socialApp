<?php
if (isset($_POST["submit-upload"])) {
	$uploads_dir = 'C:/wamp/www/Quicktrail/Users/Avatar';
	$tmp_name = $_FILES["photo"]["tmp_name"];
	//$name = $_FILES["photo"]["name"];

	$temp = explode(".", $_FILES["photo"]["name"]);
	// rename file to avoid duplicate
	// future changes : add id number of user in filename
	$newfilename = '0000' . round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($tmp_name, "$uploads_dir/$newfilename");
	session_start();
	$_SESSION["avatarphotolink"] = $newfilename;

	//save avatar link and userid
}
?>
<div>
	<form action="avataruploader.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="photo">
		<input type="submit" name="submit-upload" value="upload">
	</form>
	<?php
		if (isset($_SESSION["avatarphotolink"])) {
			echo "<center><img src='Avatar/".$_SESSION["avatarphotolink"]."' alt='no photo'
			 style='border-radius:7px;max-width:100%;height:auto;'></center>";
		}
	?>
</div>