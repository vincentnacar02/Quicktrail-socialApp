<?php

require_once("C:\wamp\www\QuickTrail/Controller/DbConnection.php");
$db = new DbConnection_Controller();

ini_set("odbc.defaultlrl", "100000K");
if(isset($_GET["id"])){
    $sql  = "select Fb_Photo from tblQuickTrail where pkTrailID='".$_GET["id"]."'";
    if ($db->StartDbConnection()) {
    $row = odbc_exec($db->GetCon(),$sql);
    odbc_fetch_row($row);
    header("Content-Type: image/jpeg");            
    $img = odbc_result($row,"Fb_Photo");
    echo $img;
    odbc_free_result($row); 
    }
}

?>  
 