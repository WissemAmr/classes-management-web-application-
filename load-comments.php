 <!DOCTYPE html>
<html>
<head>
  <title>table salle</title>
  <link rel="stylesheet" type="text/css" href="TSSS.css">
  <meta charset="UTF-8">

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
    $namme="";  /*  la récuperation des données d'aprés le formulaire   */
    $matri="";
    $role=""; 
    $Motif="";
    $date_debut="";
    $heure="";
    $heure_fin="";
    $Duration="";
    include_once 'function.php'; 





    if (isset($_POST['namme']))
    {$_SESSION['namme'] = $_POST['namme']; 
     $namme= $_POST['namme'];}
    if (isset($_POST['matricule'])) 
    {$_SESSION['matricule'] = $_POST['matricule'] ; 
$matricule= $_POST['matricule'] ;}  
if (isset($_POST['role'])) 
    {$_SESSION['role'] = $_POST ['role']; 
$role= $_POST ['role'];} 
    if (isset($_POST['Motif'])) 
    {$_SESSION['Motif'] = $_POST ['Motif']; 
$Motif= $_POST ['Motif'];} 
    if (isset($_POST['date_debut'])) 
    {$date_debut=$_POST['date_debut'];}
    if (isset($_POST['heure'])) 
    {$_SESSION['heure'] = $_POST['heure']; 
$heure= $_POST['heure'];}
    if (isset($_POST['heure_fin'])) 
    {$_SESSION['heure_fin'] = $_POST['heure_fin']; 
$heure_fin= $_POST['heure_fin'];}
     if (isset($_POST['Duration']))
   {$_SESSION['Duration'] = $_POST['Duration']; 
$Duration= $_POST['Duration'];}
   $_SESSION['date_debut'] = date("Y-m-d", strtotime($date_debut)); /* on change le format de date pour qu'elle soit compatible avec le format de la BDD */
   $newDate= date("Y-m-d", strtotime($date_debut));  
   $now=time();
   $yourdate=strtotime($date_debut);
   $datediff=$yourdate-$now;
   if (ceil($datediff/86400)>15) 
   {recherche_salle ($conn,$newDate,$heure,$heure_fin);} /* la recherche des salles libres selon la date ,les heures de début et fin  */
   else 
   {	echo "<script> location.replace('page_15_jours.php'); </script>";}  /* si la reservation n'est pas faite 15 j avant la date précise on affiche cette page   */
?> 


  </div>
</body>
</html>



    
   
  

   
 

 
  
  
 












 
