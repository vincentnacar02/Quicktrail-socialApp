<center>
<div id="create" class="ui-content" style="background-color:white;border:1px solid #585899;border-radius:7px;">
	<?php

		echo "
			<table>
				<tr>
					<td colspan='2'>
					<div style='border-radius:7px;'>
						<iframe src='API/Maplocation.php' style='height:100px;' frameborder='0'></iframe>
					</div>
					</td>
				</tr>
				<tr>
					<td>
						<img src='Users/Avatar/".$_SESSION["userAvatar"]."' 
						height='80px' width='80px' style='border-radius:7px;'>
					</td>
					<td>
						<h3>What's happening?</h3>
						<label id='curlocation' style='font-size:small;color:gray;'>...</label>
					</td>
				</tr>
			<table>";

	?>

<script type="application/javascript">
    function getgeoip(json){
    	// add condition here
    	if (json.status == "success") {
        	document.getElementById("curlocation").innerText = json.city + " - " + json.country;      			
    	};
    }
</script>
<script type="application/javascript" src="http://ip-api.com/json?callback=getgeoip"></script>

	<form action="Dashboard.php" method="POST" enctype="multipart/form-data">

		<script type="text/javascript">
		    function GetLocation()
		    {
		    	// add this in 'post it' button onclick event
		    	document.getElementById("mylocation").value = document.getElementById("curlocation").innerText;
		    }
		</script>

		<input type="hidden" name="mylocation" id="mylocation" value="">
		<table>
			<tr>
				<td><b style='color:teal;font-size:large;'>Im:</b></td>
				<td>
					<select name="Doing" id="doing">
						<option value="Saying">Saying</option>
						<option value="Asking">Asking</option>
						<option value="Playing">Playing</option>
						<option value="Watching">Watching</option>
						<option value="Listening">Listening</option>
						<option value="Drinking">Drinking</option>
						<option value="Looking">Looking</option>
						<option value="Writing">Writing</option>
						<option value="Working">Working</option>
						<option value="Singing">Singing</option>
						<option value="Studying">Studying</option>
						<option value="Cooking">Cooking</option>
						<option value="Coding">Coding</option>
						<option value="Going">Going</option>						
						<option value="Traveling">Traveling</option>
						<option value="Walking">Walking</option>	
						<option value="Running">Running</option>	
						<option value="Swimming">Swimming</option>
						<option value="Climbing">Climbing</option>				
						<option value="Testing">Testing</option>
						<option value="Eating">Eating</option>
						<option value="Supporting">Supporting</option>
						<option value="on a Meeting">on a Meeting</option>
						<option value="on a Break">on a Break</option>
						<option value="on a Bus">on a Bus</option>
						<option value="using CR">using CR</option>
						<option value="Visiting">Visiting</option>
						<option value="Requesting">Requesting</option>						
					</select>
				</td>
				<td>
					<img src="images/wrote.png" alt="edit action" onClick="">
					<label style="font-size:small;">manage action</label>
				</td>
			</tr>
			<tr>
				<td><b style='color:teal;font-size:large;'></b></td>
				<td>
					<textarea name="desc" placeHolder="write something"></textarea>
				</td>
				<td>
					<input type="text" name="tags" placeHolder="e.g. #Motivation">
				</td>
			</tr>
			<tr>
				<td><b style='color:teal;font-size:large;'>At:</b></td>
				<td>
					<select name="Where" id="where">
						<option value="House">House</option>
						<option value="Office">Office</option>
						<option value="Field">Outside Office</option>
						<option value="My Friend Birthday party">My Friend Birthday party</option>
					</select>
				</td>
				<td>
					<img src="images/wrote.png" alt="edit event/location" onClick="">
					<label style="font-size:small;">manage event / location</label>
				</td>
			</tr>
			<tr>
				<td>
					<b style='color:teal;font-size:large;'>Photo:</b>
				</td>
				<td>
					<iframe src="users/photouploader.php" 
					frameborder='0' onload='resizeIframe(this)' width="100%"></iframe>
				</td>
				<td></td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					<input type="submit" name="submit-trail" value="Post it">
				</td>
			</tr>
		</table>
	</form>
</div>
</center>