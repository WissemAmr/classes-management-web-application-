<?php 
/* code de connexion à la BDD */
$dbServername = "localhost:3306"; 
$dbUsername = "root"; 
$dbPassword =""; 
$dbName="test";  

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

// check connection 
if (!$conn) 
{
	die ("connection failed : ".mysqli_connect_error());

} 
//echo "connected"."<br>"; 
?>