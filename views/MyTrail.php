

<div>
	<table>
		<tr>
			<td>
				<b style="font-size:medium;color:teal;">Trails</b>
			</td>
			<td>
					<select name="filter" id="filter">
						<option value="Today">Today</option>
						<option value="Yesterday">Yesterday</option>
						<option value="Last Week">Last Week</option>
						<option value="Last Month">Last Month</option>
					</select>
			</td>
			<td>
				<input type="text" name="q" placeHolder="#Search">
			</td>
		</tr>
	</table>
	<br>
</div>
<?php

	require_once("Controller/Trail.php");
	$t = new MyTrail();
	if ($db->StartDbConnection()) {
		if ($t->LoadTrails($db->GetCon())) {	
			// log success
		}
	}else{
		echo "error connection.";
	}

?>
