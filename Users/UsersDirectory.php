<div>
<center>
	<h3 style="color:teal;">Users Directory</h3><br>
	<?php
		if (isset($_POST["submit-searchuser"])) {
			if (empty($_POST["search-user"])) {
				echo "Please input search keyword!";
			}		
		}
	?>
	<form action="Dashboard.php" method="POST">
	<table>
		<tr>
			<td>
				<input type="text" name="search-user" placeHolder="@Search">
			</td>
			<td>
				<input type="submit" name="submit-searchuser" value="Search">
			</td>
		</tr>
	</table>
	</form>
</center>
</div>