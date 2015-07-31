<?php

/**
* Create Account Class : Author - Vincent Nacar 7/13/15 11:57pm
*/
class CreateAccount
{
	var $email;
	var $fullname;
	var $sex;
	var $bday;
	var $pass;

	function __construct($email)
	{
		//$this->fullname = $fullname;
		//$this->sex = $sex;
		//$this->bday = $bday;
		$this->email = $email;
		//$this->pass = $pass;
	}

	public function CheckEmailIfExists($db){
		$query = "select Fc_Email from tblMember";
		$rows = odbc_exec($db,$query);
		while(odbc_fetch_row($rows)){
			$existing = odbc_result($rows,"Fc_Email");
			if ($this->email==$existing) {
				return true;
			}
		}
	}

	public function GetUserData($fullname,$sex,$bday,$pass){
		$this->fullname = $fullname;
		$this->sex = $sex;
		$this->bday = $bday;
		$this->pass = $pass;
	}

	public function SaveNewAccount($db){
		$query = "insert into tblMember(Fc_Fullname,Fc_Gender,Fc_Email,Fc_Bday,Fc_Password,Fc_PhotoLink)
					VALUES('".$this->fullname."','".$this->sex."','".$this->email."'
						,'".$this->bday."','".$this->pass."','default.jpg')";
		if (odbc_exec($db,$query)) {
			return true;
		}
	}

}

?>