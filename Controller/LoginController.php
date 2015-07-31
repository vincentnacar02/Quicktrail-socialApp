<?php
	
	/**
	* 
	*/
	class LoginController
	{
		var $username;
		var $pass;
		//var $loginStatus;
		public function SetCredential($user,$pass)
		{	
			$this->username = $user;
			$this->pass = $pass;
		}
		public function Authenticate($db)
		{
			try {
				$query = "select Pk_MemberID,Fc_Email,Fc_Password,Fc_PhotoLink from tblMember
				 	where Fc_Email='".$this->username."'
				 	 and Fc_Password='".$this->pass."'";
				$toprow = odbc_exec($db,$query);
				if(odbc_fetch_row($toprow)){
					$u = odbc_result($toprow,"Fc_Email");
					$p = odbc_result($toprow,"Fc_Password");
					$_SESSION["userID"] = odbc_result($toprow,"Pk_MemberID");
					$_SESSION["userAvatar"] = odbc_result($toprow,"Fc_PhotoLink");
					if ($this->username==$u&&$this->pass==$p) {
						return true;
					}else{
						return false;
					}				
				}else{
					return false;
				}
			} catch (Exception $e) {
				
			}
		}
		public function GetLoginUser($db,$user)
		{
			try {
				$query = "select Fc_Fullname from tblMember
				 	where Pk_MemberID='".$user."'";
				$toprow = odbc_exec($db,$query);
				if(odbc_fetch_row($toprow)){
					return odbc_result($toprow,"Fc_Fullname");
				}				
			} catch (Exception $e) {
				return "";
			}
		}

	}

?>