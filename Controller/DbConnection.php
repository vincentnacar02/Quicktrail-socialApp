<?php

// Author : Vincent Nacar
// Module : Database Connection Class
class DbConnection_Controller
{
	var $servername;
	var $connection;
	var $db;
	public function SetServer()
	{
		$this->servername = "(local)\sql2008r2"; //serverName\instanceName, portNumber (default is 1433)
	}
	public function SetDatabase()
	{
		$this->db = "TrailDB";
	}
	public function SetConnectionString()
	{
		$this->connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=".$this->servername.";Database=".$this->db.";", "sa", "ucore");
	}
	public function StartDbConnection()
	{
		$this->SetServer();
		$this->SetDatabase();
		$this->SetConnectionString();
		if( $this->connection ) {
		     return true;
		}else{
			 return false;
			 die( print_r( sqlsrv_errors(), true));
		}			
	}
	public function GetCon()
	{
		return $this->connection;
	}

}

?>
