<?php 
include('form.php'); 
session_start();

$ses_sql="SELECT * FROM user WHERE IDUser ='".$_SESSION['IDUser']."'";
    $results2 = mysqli_query($conn,$ses_sql); 
    $resultscheck2 = mysqli_num_rows ($results2); 
    $row2= mysqli_fetch_assoc($results2);
    if (!isset($_SESSION['IDUser'])) 
    	{ 

             header("location:connexion.php"); 
             die();


    	}