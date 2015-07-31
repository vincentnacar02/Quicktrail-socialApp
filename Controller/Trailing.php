<?php
/**
* Author : Vincent Nacar ; 7/11/15 12:56 AM
*/
class Trail
{
	var $user;
	var $doing;
	var $desc;
	var $where;
	//var $timestart;
	//var $timestop;
	var $tag;
	var $pfilename;

	function __construct($User,$doing,$desc,$where,$tag,$pfilename)
	{
		//date_default_timezone_set('UTC/GMT');
		$this->user = $User;
		$this->doing = $doing;
		$this->desc = $desc;
		$this->where = $where;
		$this->tag = $tag;
		$this->pfilename = $pfilename;
	}

	public function SetTimeStart()
	{
		$this->timestart = date("F j, Y, g:i a");    
	}
	public function SetTimeStop($timestop)
	{
		$this->timestop = $timestop;
	}

	public function SaveTrail($db)
	{
		try {
			$query = "insert into tblQuickTrail
			(Fc_Fullname,Fc_Doing,Fc_Desc,Fc_Where,Fc_TimeStart,Fk_ID,Fc_Tag,Fc_Photolink)
			values('".$this->user."','".$this->doing."',
				'".$this->desc."','".$this->where."',GETDATE(),
				'".$_SESSION["userID"]."','".$this->tag."','".$this->pfilename."')";
			if (odbc_exec($db,$query)) {
				$_SESSION["photolink"] = ""; // clear 
				return true;
			}	
			return false;
		} catch (Exception $e) {
			return false;
		}
	}


}

?>