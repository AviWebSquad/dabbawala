<?php
//local and remote server connection
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1:3306' || $_SERVER['REMOTE_ADDR'] == '::1')
{	
	@define("hostname","127.0.0.1:3306");
	@define("username","root");
	@define("password","");
	@define("database","db");
}
else
{
	@define("hostname","127.0.0.1:3306");
	@define("username","root");
	@define("password","");
	@define("database","db");
}
// Create connection
$con = new mysqli(hostname,username,password,database);
$db = mysqli_select_db($con,database);
// Check connection
if ($con->connect_error) 
{
	die("Connection failed: " . $con->connect_error);
}
session_start();

/*function period(){
echo "Period: ".  date("d-M-Y").", ".date("h:i:sa");
}*/
?>