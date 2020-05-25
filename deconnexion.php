<?php 
/* le code de déconnexion*/
session_start();
$_SESION= array();
session_destroy();
header("Location:connexion.php");
?>