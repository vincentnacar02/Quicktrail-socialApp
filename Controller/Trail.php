<?php

/**
* 
*/
class MyTrail
{
	public function LoadTrails($db)
	{
		$query = "select 
					Fk_ID,
					a.Fc_Fullname,
					Fc_Doing,
					Fc_Desc,
					Fc_Where,
					Fc_TimeStart,
					pkTrailID,
					Fc_Tag,
					a.Fc_PhotoLink,
					b.Fc_PhotoLink as [User_PLink]
					from tblQuickTrail a
					LEFT JOIN tblMember b on a.Fk_ID = b.Pk_MemberID 
					order by pkTrailID desc";
		$rows = odbc_exec($db,$query);
		while(odbc_fetch_row($rows)){
			$id = odbc_result($rows,"Fk_ID");
			$user = odbc_result($rows,"Fc_Fullname");
			$d = odbc_result($rows,"Fc_Doing");
			$desc = odbc_result($rows,"Fc_Desc");
			$w = odbc_result($rows,"Fc_Where");
			$t = odbc_result($rows, "Fc_TimeStart");
			$trailID = odbc_result($rows, "pkTrailID");
			$tag = odbc_result($rows, "Fc_Tag");
			$photolink = odbc_result($rows, "Fc_PhotoLink"); 
			$userphoto = odbc_result($rows, "User_PLink");
			echo "
			<div class='ui-content' style='border-radius:7px;border:1px solid #585899;background-color:white;'>
				<div style='background-color:white;padding:2%;border-radius:7px;'>
						<table>
							<tr>
								<td>
									<img src='Users/Avatar/".$userphoto."' 
									height='50px' width='50px' style='border-radius:7px;'>
								</td>
								<td><a href='' class='ui-btn'><b style='color:teal;'>".$user."</b></a></td>
								<td><small style='color:gray;'>is ".$this->MiniEvent($photolink)."</small></td>
								<td>".$this->GetEventIcon($d)."</td>
								<td id='event'><b>".$d."</b></td>
							</tr>
						</table>
						<hr>
						".$this->isPhoto($photolink)."
						<table>
							<tr>
								<td><span>".$desc."</span></td>
								<td><b style='font-size:large;color:teal;'>".$tag."</b></td>
							</tr>
						</table>
						<table>
							<tr>
								<td>
									<small style='color:teal;'>at ".$w."</small>
								</td>
								<td>
									<small style='color:gray;'>".$t."</small>
								</td>
							</tr>
						</table>
				</div>
				<div class='ui-content' id='writecomment'>
					<form action='Dashboard.php' method='POST'>
					<input type='hidden' name='trailID' value='".$trailID."'>
						<table>
						<tr>
							<td>
								<img src='Users/Avatar/".$_SESSION["userAvatar"]."' 
								height='30px' width='30px' style='border-radius:7px;'>
							</td>
							<td>
							<textarea name='comment' placeHolder='say something'></textarea></td><td>
							<input type='submit' name='submit-comment' value='add comment'></td>
						</tr>
						</table>
					</form>
				</div>
				<div id='comments'>
				<small>comments</small><img src='images/Comment.png'>
					<iframe id='frameComments'
					 src='pagelets/LoadComments.php?id=".$trailID."' width='100%'
					 onload='resizeIframe(this)' frameborder='0' scrolling='yes'>
					</iframe>
				</div>
			</div><br>";
		}	
	}
	// possible changes here 
	// Added by Vincent Nacar 7/11/15 9:10 pm
	public function GetEventIcon($event){
		switch ($event) {
			case 'Looking':
				return "<img src='images/looking.png'>";
				break;
			case 'Asking':
				return "<img src='images/asking.png'>";
				break;
			case 'Saying':
				return "<img src='images/asking.png'>";
				break;
			case 'Listening':
				return "<img src='images/listening.png'>";
				break;
			case 'Traveling':
				return "<img src='images/traveling.png'>";
				break;
			case 'Writing':
				return "<img src='images/wrote.png'>";
				break;
			default:
				return "";
				break;
		}
	}

	public function isPhoto($imglink){
		if ($imglink!="") {
			return "<center>
				<table>
					<tr>
						<td>
							<img src='Users/Images/".$imglink."' 
							 style='border-radius:7px;max-width:100%;height:auto;'>
						</td>
					</tr>
				</table></center>";
		}
	}

	public function MiniEvent($key){
		if ($key!="") {
			return "added a photo";
		}
	}

}
?>


