<!DOCTYPE html>
<html>
<head>
  <title>mini visualiser le planning</title>
  <link rel="stylesheet" type="text/css" href="mini_reservation.css">
  <meta charset="utf-8">

</head>
<body >

  <div class="formulaire">
   <div class="row">
 <div class="logo">
        <img src="projet/g-salle.png" / alt="graduation" class="logo-img">
      </div>
           <ul class="main-nav">
             
             <li   class="active"><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous deconnecter</span> &nbspDECONNEXION</a></li>
             <li><a href="aide.php"><i class="fa fa-question-circle-o"></i><span> Obtenir de l'aide</span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire à propos de nous</span> &nbspA PROPOS</a></li>
           </ul>
         </div>



<?php 
session_start();
include 'visualiser.php'; /* la fonction qui visualise le planning par période et par salle */

 $date_debut="";
 $date_fin="";
 $namme="";


/*  récuperation des données d'apres le formualaire*/
if (isset($_POST['salle']))
    {$_SESSION['salle'] = $_POST['salle']; 
     $namme= $_POST['salle'];} 

if (isset($_POST['date_debut'])) 
    {$date_debut=$_POST['date_debut'];}

if (isset($_POST['date_fin'])) 
    {$date_fin=$_POST['date_fin'];} 

 $_SESSION['date_debut'] = date("Y-m-d", strtotime($date_debut));
 $newDate= date("Y-m-d", strtotime($date_debut)); 
 $_SESSION['date_fin'] = date("Y-m-d", strtotime($date_fin));
 $newDate2= date("Y-m-d", strtotime($date_fin)); 

 visualiser($namme,$newDate,$newDate2); 
 ?> 
  <form class="for"> 
        <input type="button" value="retour" class="form1" name="button" onclick="history.go(-2);"><!-- button retour avec js-->
      </form>
</div>
</body>
</html>
