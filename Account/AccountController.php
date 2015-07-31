<?php


/**
* 
*/
class AccountController
{
	var $userID;
	function __construct($userID)
	{
		$this->userID = $userID;	
	}
	public function LoadUserInfo($db)
	{
		try {
			$query = "select Fc_Fullname,Fc_Gender,Fc_Email,Fc_Bday,Fc_PhotoLink from tblMember 
						where Pk_MemberID='".$this->userID."'";
			$rows = odbc_exec($db,$query);
			while(odbc_fetch_row($rows)){
				$user = odbc_result($rows,"Fc_Fullname");
				$sex = odbc_result($rows,"Fc_Gender");
				$email = odbc_result($rows,"Fc_Email");
				$bday = odbc_result($rows,"Fc_Bday");
				$avatar = odbc_result($rows,"Fc_PhotoLink");
				echo "
				<table><tr><td>
					<table style='border-right:1px solid gray;'>
						<tr>
							<td><img src='Users/Avatar/".$avatar."' alt='no photo'
							 height='180px' width='180px' style='border-radius:7px;'></td>
						</tr>
						<tr>
							<td><input type='button' name='submit-editphoto' value='Change Photo'></td>
						</tr>
						<tr>
							<td><input type='button' name='submit-changepass' value='Change Password'></td>
						</tr>
					</table></td><td>
					<table>
						<tr>
							<td><b style='color:gray;'>Username:</b></td>
							<td><input type='text' name='fullname' value='".$user."' style='color:teal;'></td>
						</tr>
						<tr>
							<td><b style='color:gray;'>Sex:</b></td>
							<td><b style='color:teal;'>".$sex."</b></td>
						</tr>
						<tr>
							<td><b style='color:gray;'>Birthday:</b></td>
							<td><b style='color:teal;'>".$bday."</b></td>
						</tr>
						<tr>
							<td><b style='color:gray;'>Email:</b></td>
							<td><b style='color:teal;'>".$email."</b></td>
						</tr>
						<tr>
							<td colspan='2'>
								<input type='button' name='submit-updateprofile' value='Update Profile'>
							</td>
						</tr>
					</table></td></tr>
				</table>
				";
			}
		} catch (Exception $e) {
			
		}
	}
}
?>