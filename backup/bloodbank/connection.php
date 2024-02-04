<?php
/*
Connect to the local server using Windows Authentication and specify
the AdventureWorks database as the database in use. To connect using
SQL Server Authentication, set values for the "UID" and "PWD"
 attributes in the $connectionInfo parameter. For example:
$connectionInfo = array("UID" => $uid, "PWD" => $pwd, "Database"=>"AdventureWorks");
*/
$serverName = "BAMCSERVER\BIZBOX";
//$serverName = "192.168.0.23";
//$connectionInfo = array("UID" => "sa", "PWD" =>"s@password1", "Database"=>"LiveDB_BAMCHS");
$connectionInfo = array("UID" => "sa", "PWD" =>"Bamc@1966", "Database"=>"LiveDB_BAMCHS");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn )
{
     echo "Connection established.\n";
	
}
else
{
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}


?>