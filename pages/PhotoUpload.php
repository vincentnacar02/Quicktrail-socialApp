<?php
if (isset($_POST["submit-upload"])) {
	$uploads_dir = 'C:/wamp/www/Quicktrail/Users/Images';
	$tmp_name = $_FILES["photo"]["tmp_name"];
	//$name = $_FILES["photo"]["name"];

	$temp = explode(".", $_FILES["photo"]["name"]);
	// rename file to avoid duplicate
	// future changes : add id number of user in filename
	$newfilename = '0000' . round(microtime(true)) . '.' . end($temp);
	move_uploaded_file($tmp_name, "$uploads_dir/$newfilename");
	session_start();
	$_SESSION["photolink"] = $newfilename;
}
?>
<div>
	<form action="PhotoUpload.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="photo">
		<input type="submit" name="submit-upload" value="upload">
	</form>
	<?php
		if (isset($_SESSION["photolink"])) {
			echo "<img src='Users/Images/".$_SESSION["photolink"]."'>";
		}
	?>
</div>